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
Route::get('/authorize', 'HomeController@github_authorize')->name('github_auth');
Route::get('/authcallback', 'HomeController@authcallback')->name('authcallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('sites','ProjectController');
