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

Route::get('userlogin', 'UserController@masuklogin');
Route::get('userlogout', 'UserController@logout');

// Using A Route Closure...

Route::get('profile', ['middleware' => 'auth', function() {
    // Only authenticated users may enter...
}]);

// Using A Controller...

Route::get('profile', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@show'
]);

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
/*
Route::group(['middleware' => ['web']], function () {
    //
});
*/
