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

Route::get('/', function () {
    return view('landingPage');
	});
	
Route::get('impressum', function() {
	return view('impressum');
});

Route::get('gamepage', function() {
	return view('gamepage');
});

Route::get('landingPage',
	['as' => 'landingPage', 'uses' => 'LandingPageController@index']);


Route::get('gamepage',
	['as' => 'gamepage', 'uses' => 'GamePageController@index']);


Route::get('gameend',
	['as' => 'gameend', 'uses' => 'GameEndController@index']);


Route::get('hostwait',
	['as' => 'hostwait', 'uses' => 'HostWaitController@index']);


Route::get('contact', 
  ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'AboutController@store']);
