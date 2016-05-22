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

Route::get('/home', function () {
    return View::make('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

<<<<<<< HEAD
=======

>>>>>>> 2755eeeb2def1c535a6c031afeae2a23aa9e04ac
//Routing yang berhubungan dengan pekerjaan
Route::get('/search-dashboard', function () {
    return View::make('search-dashboard');
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

		Route::get('/info', function () {
	    	return view('info');
		});

		Route::get('/', [
		    'middleware' => 'auth',
		    'uses' => 'PekerjaanController@index'
		]);

			Route::get('/login', function () {
    	return view('login');
	});
<<<<<<< HEAD

		Route::get('/search-dashboard', function () {
			return View::make('search-dashboard');
		});
		Route::get('/lihatPelamar', function () {
		    return view('pekerjaan.lihatPelamar');
		});
		Route::get('/riwayatApply', function () {
		    return view('pekerjaan.riwayatApply');
		});
		Route::get('/riwayatJobGiver', function () {
		    return view('pekerjaan.riwayatJobGiver');
		});
	




=======
	Route::get('/', function () {
		return View::make('home');
	});
	Route::get('/home', function () {
		return View::make('home');
	});
	Route::get('/search-dashboard', function () {
    return View::make('search-dashboard');
	});
    Route::get('/password', function () {
    	return view('password');
	});
>>>>>>> 2755eeeb2def1c535a6c031afeae2a23aa9e04ac
	Route::get('sso-login','SSOController@login');
	Route::get('logout','SSOController@logout');
	Route::post('userlogin', 'UserController@masuklogin');
	Route::get('userlogout', 'UserController@logout');
    Route::get('/edit', 'UserController@editForm');
	Route::post('saveprofile', 'UserController@editProfile');
    Route::get('/bukalowongan', 'PekerjaanController@bukaLowongan');
	Route::post('addlowongan', 'PekerjaanController@insertPekerjaan');
<<<<<<< HEAD
	Route::get('/searchPekerjaan',['uses' => 'PekerjaanController@searchPekerjaan']);
=======
	Route::get('/listPekerjaan','PekerjaanController@index');
	Route::post('/searchPekerjaan',['uses' => 'PekerjaanController@searchPekerjaan']);
>>>>>>> 2755eeeb2def1c535a6c031afeae2a23aa9e04ac
	Route::get('/pekerjaan/{pekerjaan}',['uses' =>'PekerjaanController@detailPekerjaan']);
Route::get('/dashboard','UserController@viewProfile');
Route::post('post-lowongan','PekerjaanController@postLowongan');
Route::get('/info', function () {
    return view('info');
});
});
