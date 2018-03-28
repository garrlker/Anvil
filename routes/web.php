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
    return view('homepage');
});



//Registration
Route::get('/sourceControlSetup', 'HomeController@linkSourceControl')->name('authorize_source_control');
Route::get('/authcallback', 'HomeController@GH_AuthCallback')->name('gh_auth_callback');
Route::get('/registrationCompleted', 'HomeController@registrationCompleted')->name('registrationCompleted');
Route::get('/userSettings/{user}','HomeController@userSettings')->name('userSettings');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::resource('sites','ProjectController');

Route::get('/test', function(){
   event(new \App\Events\TestFire());
   return 'fired';
});