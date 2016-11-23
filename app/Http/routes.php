<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();

Route::group(['middleware' => ['auth', 'resolver']], function() {
	//Routes for ProjectController
	Route::get('/', 'ProjectController@index');
	Route::resource('/project', 'ProjectController');
});
