<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Project;
use Mockery\Exception;

class ProjectApiController extends Controller
{
    public function ping($uuid){
        try {
            $project = Project::where('uuid', '=', $uuid)->firstorfail();
        } catch(ModelNotFoundException $e) {
            $error = array('error' => 'No project with that UUID');
            return json_encode($error);
        }
        return $project->toJson();
    }

    public function setCommandToIdle($uuid){
        try {
            $project = Project::where('uuid', '=', $uuid)->firstorfail();
            $project->command='idle';
            $project->save();
        } catch(ModelNotFoundException $e) {
            $error = array('error' => 'No project with that UUID');
            return json_encode($error);
        }
        return $project->toJson();
    }
}
