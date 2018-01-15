<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use GuzzleHttp;
use Auth;

class ProjectController extends Controller
{
    public function create(Request $request){
        //Grab Repositories from api
        $client = new GuzzleHttp\Client();
        $response = $client->get('https://api.github.com/user/repos?visibility=all&affiliation=owner,collaborator',
            [
                'auth' => [
                    'Bearer',
                    Auth::user()->github_access_token
                ],
            ]
        );
        //Parse the access token out, and add it to our user
        $repositories = json_decode($response->getBody()->getContents());
        //dd($repositories);
        return view('Sites.create', compact('repositories'));
    }

    public function store(Request $request){

    }
}
