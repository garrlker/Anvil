<?php

namespace App\Http\Controllers;

use App\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Project;
use App\Deployment;
use App\GithubAuth;
use GuzzleHttp;
use Uuid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function linkSourceControl(Request $request){

        //Before we do anything else, lets give our user settings
        $settings = new UserSettings();
        $settings->user_id = Auth::user()->id;
        $settings->save();

        $strState = Uuid::generate()->string;
        //Build github auth route
        $github_auth_url    = 'https://github.com/login/oauth/authorize?';
        $client_id          = 'client_id='.env('GITHUB_CLIENT_ID');
        $redirect_uri       = '&redirect_uri='.route('gh_auth_callback');
        $scope              = '&scope=repo';
        $state              = '&state='.$strState;
        $auth_route         = $github_auth_url.$client_id.$redirect_uri.$scope.$state;

        //If user has not authenticated yet then, create github auth
        if(!count(Auth::user()->githubAuth)) {
            //Before return, create the auth
            $github_auth = new GithubAuth();
            $github_auth->state = $strState;
            $github_auth->user_id = Auth::user()->id;
            $github_auth->save();
        }

        return view('authorize', compact('auth_route'));
    }

    public function GH_AuthCallback(Request $request){
        $code = $request->input('code');
        $state= $request->input('state');
        $user = GithubAuth::where('state','=',$state)->first()->user;

        if($state == Auth::user()->githubAuth->state){
            //The state is the same, let's grab this users access token
            $client = new GuzzleHttp\Client();
            $response = $client->post('https://github.com/login/oauth/access_token',
                [
                    'form_params' => [
                        'client_id' => env('GITHUB_CLIENT_ID'),
                        'client_secret' => env('GITHUB_SECRET_ID'),
                        'code' => $code,
                        'redirect_uri' => route('gh_auth_callback'),
                        'state' => $state,
                        'accept' => 'application/json'
                    ]
                ]
           );
            //Parse the access token out, and add it to our user
            parse_str($response->getBody()->getContents(), $responseJson);

            $user->github_access_token = $responseJson['access_token'];
            $user->save();

            //Cleanup
            GithubAuth::where('state','=',Auth::user()->githubAuth->state)->forceDelete();
        }

        //Registration complete
        //(this will be the endpoint for BB and GL when they are implemented too)
        return redirect('registrationCompleted');
    }

    public function registrationCompleted(Request $request){
        return view('registrationCompleted');
    }

    public function userSettings(Request $request, User $user){
        return view('userSettings', compact('user'));
    }
}
