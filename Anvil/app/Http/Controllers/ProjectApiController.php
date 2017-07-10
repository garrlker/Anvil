<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Project;
use Mockery\Exception;

class ProjectApiController extends Controller
{
    /**
     * So the commands are kind've self explanatory right now
     * They are:
     * idle
     * clone
     * pull
     *
     * There will be more as I see a use for a new command, but for now this is enough
     */


    /**
     * @param $uuid
     * @return string
     */
    public function ping($uuid){
        try {
            $project = Project::where('uuid', '=', $uuid)->firstorfail();
        } catch(ModelNotFoundException $e) {
            $error = array('error' => 'No project with that UUID');
            return json_encode($error);
        }
        return $project->toJson();
    }

    /**
     * @param $uuid
     * @return string
     */
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
