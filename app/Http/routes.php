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
    return view('welcome');
});

Route::get('status/status','StatusController@index');
Route::post('status/status','StatusController@postindex');

Route::resource('submit/submit','SubmitController');

Route::get('/tre', function () {
    return "dsadsadsa";
});

Route::get('status','StatusController@index');
Route::get('submit','SubmitController@index');
Route::get('/frontpage', function () {
    return view('index');
});
Route::resource('problems', 'ProblemController');
