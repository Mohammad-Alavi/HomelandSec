<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('newps1', 'HomeController@download');
Route::post('upload', 'HomeController@upload');
Route::post('store', 'HomeController@store');
Route::get('dllog/{id}', 'HomeController@dllog');
Route::get('mainps1', 'HomeController@downloadscript');