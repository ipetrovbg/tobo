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
    return view('index');
});

Route::get('/tobo-logout', function () {
	Auth::logout();
    return view('auth.login');
});

Auth::routes();

/* web routes */
Route::get('/dashboard', 'DashboardController@index');
Route::get('/images', 'ImagesController@images')->middleware('auth');
Route::get('/dashboard/building', 'BuildingController@viewBuildings')->middleware('auth');


/* public api routes */
Route::group(['prefix' => 'api/v1'], function () {

	Route::get('/images', 'ImagesController@getAllImages');

	Route::get('/coords/{container}/{id}', 'CoordinateController@getCoords');
});

/* protected api routes */
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () {

	Route::post('/images', 'ImagesController@index');
	
	Route::post('/coords/{container}/{id}', 'CoordinateController@save');

	Route::post('building', 'BuildingController@save');

});


