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



Route::get('/pekerjaanDashboard/{pekerjaan}',['uses' =>'PekerjaanController@detailPekerjaanFromDashboard']);


Route::get('/detail', function() {
    return view('detail');
});



Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/infoAccount', function () {
    return view('infoAccount');
});

//Routing yang berhubungan dengan pekerjaan
Route::get('/search-dashboard', function () {
    return View::make('search-dashboard');
});

Route::get('/inbox', 'AdminController@index');

Route::get('/manageUser', function () {
    return View::make('admin.manageUser');
});

Route::get('/createUser', function () {
    return View::make('admin.createUser');
});

Route::get('/editUser', function () {
    return View::make('admin.editUser');
});

Route::get('/verify/{idPekerjaan}', 'PekerjaanController@verifyJob');


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
	Route::get('/login', function () {
    	return view('login');
	});
	Route::get('/', function () {
		return View::make('home');
	});
	Route::get('/home', function () {
		return View::make('home');
	});
	Route::get('/search-dashboard', function () {
    return View::make('search-dashboard');
	});
	Route::get('sso-login','SSOController@login');
	Route::get('logout','SSOController@logout');
	Route::post('userlogin', 'UserController@masuklogin');
	Route::get('userlogout', 'UserController@logout');
    Route::get('/edit', 'UserController@editForm');
	Route::post('saveprofile', 'UserController@editProfile');
    Route::get('/bukalowongan', 'PekerjaanController@bukaLowongan');
	Route::post('addlowongan', 'PekerjaanController@insertPekerjaan');
	Route::get('/listPekerjaan','PekerjaanController@index');
	Route::post('/searchPekerjaan',['uses' => 'PekerjaanController@searchPekerjaan']);
	Route::get('/pekerjaan/{pekerjaan}',['uses' =>'PekerjaanController@detailPekerjaan']);
Route::get('/dashboard','UserController@viewProfile');
Route::post('post-lowongan','PekerjaanController@postLowongan');
Route::get('/info', function () {
    return view('info');
});
});