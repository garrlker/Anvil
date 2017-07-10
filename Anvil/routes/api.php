<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping/{uuid}', 'ProjectApiController@ping')->name('PingProjectInfo');
Route::get('/setToIdle/{uuid}', 'ProjectApiController@setCommandToIdle')->name('SetToIdle');
Route::post('/deploy/{project_uuid}', 'ProjectController@deploy')->name('DeployProjectApi');
