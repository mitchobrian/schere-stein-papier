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

Route::get('gameend', function() {
	return view('gameend');
});

Route::get('hostwait', function() {
	return view('hostwait');
});


Route::get('contact', 
  ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'AboutController@store']);
