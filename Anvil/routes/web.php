<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'ProjectController@index')->name('ShowProjects');
Route::get('/viewProject/{project_uuid}', 'ProjectController@viewProject')->name('ViewProject');
Route::post('/add', 'ProjectController@store')->name('AddProject');
Route::get('/deploy/{project_uuid}', 'ProjectController@deploy')->name('DeployProject');

Route::get('/client', function(){
    return view('client');
});

