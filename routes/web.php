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

// return view('home');
//     Route::get('/', function () {
// });

Route::resource('/', 'HomeController');
Route::get('uploads', 'HomeController@download');
Route::post('result', 'HomeController@create');