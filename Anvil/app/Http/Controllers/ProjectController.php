<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use App\Project;
use Auth;
use Uuid;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        dd($projects);
    }
    public function store(Request $request){
        //Store Project
        $project = new Project;
        $project->uuid          = Uuid::generate()->string;
        $project->name          = $request->input("projName");
        $project->repo_url      = $request->input("repoURL");
        $project->file_path     = $request->input("filePath");
        $project->description   = $request->input("description");
        $project->command       = 'pull';
        $project->number_of_pushes = 0;
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect('home');
    }

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

}
