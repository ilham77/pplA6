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
Route::get('/', ['as' => 'home', function ()
{
	return View::make('home');
}]);

Route::get('/login', function () {
    return view('login');
});

Route::get('/pekerjaan/{pekerjaan}',['uses' =>'PekerjaanController@detailPekerjaan']);
Route::get('/detail', function () {
    return view('detail');
});


Route::get('sso-login','Controller@login');
Route::get('logout','Controller@logout');

Route::get('/infoAccount', function () {
    return view('infoAccount');
});

//Routing yang berhubungan dengan pekerjaan
Route::post('/addPekerjaan',['uses' => 'PekerjaanController@insertPekerjaan']);
Route::get('/insertPekerjaan', function () {
    return view('pekerjaan.insertPekerjaan');
});

Route::get('/search-dashboard', function () {
    return View::make('search-dashboard');
});


Route::get('/listPekerjaan','PekerjaanController@index');
Route::post('/searchPekerjaan',['uses' => 'PekerjaanController@searchPekerjaan']);


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
    Route::get('/bukalowongan', function () {
		return view('postlowongan');
	});
	Route::post('addlowongan', 'PekerjaanController@insert');

});

