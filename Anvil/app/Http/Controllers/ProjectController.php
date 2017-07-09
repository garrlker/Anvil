<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        dd($projects);
    }
    public function store(Request $request){
        //Store Project
        $project = new Project;
        $project->name = $request->input("projName");
        $project->repo_url = $request->input("repoURL");
        $project->description = $request->input("description");
        $project->number_of_pushes = 0;
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect('home');
    }

}
