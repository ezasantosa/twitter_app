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
//Route::group(['middleware' => 'auth'], function () {
   
Route::get('/', function () {
    return view('welcome');
    //return redirect()->route('login');
});

Route::auth();

Route::group(['prefix' => 'home'], function () {

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home',
        // 'middleware' => 'auth'
    ]);

    Route::get('/data', [
        'uses'  => 'HomeController@getData',
        'as'    => 'home.data',
    ]);

    Route::post('/save', [
        'uses'  => 'HomeController@save',
        'as'    => 'home.save',
    ]);


});

// Route::get('/home', 'HomeController@index');

//Route::get('/profile', 'UsersController@getProfile');


Route::group(['prefix' => 'user'], function () {

    Route::get('/', [
    	'uses' => 'UsersController@getIndex',
    	'as' => 'user',
    	// 'middleware' => 'auth'
	]);

    Route::get('/profile', [
    	'uses'	=> 'UsersController@getProfile',
    	'as'	=> 'user.profile',
	]);

	Route::post('/save', [
		'uses'	=> 'UsersController@saveProfile',
		'as'	=> 'user.save'
	]);

});

//});



