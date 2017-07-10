<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use App\Project;
use Carbon\Carbon;
use Auth;
use Uuid;

class ProjectController extends Controller
{

    public function index(){
        $projects = Project::all();
        dd($projects);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        //Store Project
        $project = new Project;
        $project->uuid          = Uuid::generate()->string;
        $project->name          = $request->input("projName");
        $project->repo_url      = $request->input("repoURL");
        $project->file_path     = $request->input("filePath");
        $project->description   = $request->input("description");
        $project->command       = 'idle';   //Start with idle, we can let user clone and push manually
        $project->number_of_pushes = 0;
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect('home');
    }

    /**
     * @param Request $request
     * @param $project_uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewProject(Request $request, $project_uuid){
        //If project with UUID doesn't exist, fail
        try {
            $project = Project::where('uuid', '=', $project_uuid)->firstorfail();
        } catch(ModelNotFoundException $e){
            return view('whoops');
        }
        //If User does not have sufficient privileges, fail
        if(!Auth::guest() && Auth::user()->id == $project->user_id) {
            return view('viewProject', compact('project'));
        }else{
            return view('whoops');
        }
    }

    public function deploy(Request $request, $project_uuid){
        //If we haven't deployed yet, set command to clone, else pull
        //If project with UUID doesn't exist, fail
        try {
            $project = Project::where('uuid', '=', $project_uuid)->firstorfail();
        } catch(ModelNotFoundException $e){
            //Do nothing
            return "failed";
        }
        if($project->number_of_pushes==0){
            $project->command='clone';
        }else{
            $project->command='pull';
        }
        //Assuming it worked toDayDateTimeString()
        //dd(Carbon::now()->format('Y-m-d H:i:s'));
        $project->last_pushed = Carbon::now()->format('Y-m-d H:i:s');
        $project->number_of_pushes += 1;
        $project->save();

        return "worked";

    }

    public function setCommand(Request $request){

        return "foo";
    }

}
