<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () 
{
	return View::make('home');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('sso-login','SSOController@login');
Route::get('logout','SSOController@logout');
Route::get('/detail', function() {
    return view('detail');
});

Route::get('/infoAccount', function () {
    return view('infoAccount');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/edit', function () {
		return View::make('edit');
	});
	Route::post('saveprofile', 'UserController@editProfile');
});

