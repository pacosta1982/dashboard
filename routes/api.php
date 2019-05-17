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



Route::post('details', 'ProjectController@details');
Route::post('proyecto/{id}', 'ProjectController@showproject');
Route::post('buscar', 'ProjectController@searchproject');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('proyectos', 'ProjectController@index');



    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::post('details', 'ProjectController@details');
    });
});
