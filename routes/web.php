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
    return view('home');
})->name('home');

Route::group(['middleware'=>'auth'], function(){
  Route::get('/upload', function () {
      return view('file.upload');
  })->name('upload');

  Route::post('/upload', 'FileController@store');

  Route::get('/list-file', 'FileController@index')->name('list-file');

  Route::get('/detail-file/{id}', 'FileController@show')->name('detail-file');

  Route::post('/detail-file/{id}', 'FileController@update')->name('update-file');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
