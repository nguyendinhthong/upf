<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/up', function () {
    return view('up.pushfile');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/upfile', 'UpController@pushFile');

Route::get('upload', function() {
  return View::make('up.upload');
});
Route::post('apply/upload', 'ApplyController@upload');
