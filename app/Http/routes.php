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

Route::get('submit/{id}','SubmitController@show');
Route::post('submit/{id}','SubmitController@save');


Route::get('/tre', function () {
    return "dsadsadsa";
});
Route::get('status','StatusController@index');
Route::get('/frontpage', function () {
    return view('index');
});
Route::resource('problems', 'ProblemController');
Route::resource('problems/tag','TagController',
    ['only' => ['index','show']]);

