<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        dd($projects);
    }
    public function store(Request $request){
        //TEST
        $project = new Project;
        $project->name = "test";
        $project->repo_url = "test";
        $project->number_of_pushes = 0;
        $project->user_id = 1;
        $project->save();
    }

}
