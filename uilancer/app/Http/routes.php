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


Route::get('/detail', function() {
    return view('detail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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

	Route::get('/', [
		    'middleware' => 'auth',
		    'uses' => 'PekerjaanController@index'
	]);



	Route::get('/search-dashboard', function () {
    return View::make('search-dashboard');
	});
    Route::get('/post', function () {
	    return view('post');
	});
	Route::get('/lihatPelamar/{pekerjaan}', 'PekerjaanController@lihatPelamar');
	Route::get('/riwayatApply', 'UserController@riwayatAsFreelance');
	Route::get('/riwayatJobGiver', 'UserController@riwayatAsJobGiver');

	Route::get('sso-login','SSOController@login');
	Route::get('logout','SSOController@logout');
	Route::post('userlogin', 'UserController@masuklogin');
	Route::get('userlogout', 'UserController@logout');
    Route::get('/edit', 'UserController@editForm');
	Route::post('saveprofile', 'UserController@editProfile');
    Route::get('/bukalowongan', 'PekerjaanController@bukaLowongan');
	Route::post('addlowongan', 'PekerjaanController@insertPekerjaan');
	Route::get('/listPekerjaan','PekerjaanController@index');
	
	Route::get('/pekerjaan/{pekerjaan}',['uses' =>'PekerjaanController@detailPekerjaan']);
	Route::get('/report/{report}',['uses' =>'ReportController@detailReport']);
    Route::get('/report/delete/{report}',['uses' =>'ReportController@deleteReport']);
    
	Route::get('/dashboard','UserController@viewProfile');
	Route::post('post-lowongan','PekerjaanController@postLowongan');
	Route::get('/ongoing/{user}', 'PekerjaanController@ongoing');
    Route::get('/apply/{pekerjaan}/{freelancer}','UserController@apply');
    Route::get('/cancelApply/{pekerjaan}/{freelancer}','UserController@cancelApply');
    Route::post('terimaLamar', 'UserController@terimaLamar');
    Route::get('/profile/{user}', 'UserController@viewPublicProfile');

    Route::get('/done/{pekerjaan}','PekerjaanController@done');
    Route::get('/confirm/{pekerjaan}','PekerjaanController@confirm');
    Route::post('report', 'ReportController@report');
	Route::post('/report/{user}/{pelapor}', 'ReportController@report');
	Route::get('/inbox', 'AdminController@index');


	Route::get('/deleteUser/{idUser}', 'AdminController@deleteUser');

	//Routing yang berhubungan dengan pekerjaan
	Route::get('/search-dashboard', function () {
	    return View::make('search-dashboard');
	});

	Route::get('/manageUser', 'AdminController@showUser');

	Route::get('/createUser', function () {
	    return View::make('admin.createUser');
	});

	Route::post('addUser', 'AdminController@createUser');

	Route::get('/editUser/{idPekerjaan}', 'AdminController@editForm');
	Route::post('postEdit', 'AdminController@editUser');

	Route::get('/verify/{idPekerjaan}', 'PekerjaanController@verifyJob');
	Route::get('/unverify/{idPekerjaan}', 'PekerjaanController@unverifyJob');
	Route::get('/delete/{idPekerjaan}', 'PekerjaanController@deleteJob');
});

if (!Auth::check()) {
    Route::get('/home', function() {
        return view('home');
    });
    Route::get('/searchPekerjaan',['uses' => 'PekerjaanController@searchPekerjaan']);

	Route::get('/info', function () {
	    return view('info');
	});
		Route::get('/login', function () {
    	return view('login');
	});
}