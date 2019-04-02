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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');
Route::get('/home/{id}', 'HomeController@show');
Route::get('/home/{id}/exp/{idexp}', 'HomeController@showexp');

Route::resource('/mapas', 'MapsController');

Route::get('/downloadhis', 'HomeController@csvhistorial');

Route::post('/filtros', 'HomeController@index');
Route::get('/filtros', 'HomeController@index');

Route::post('/filtrosmapa', 'MapsController@index');
Route::get('/filtrosmapa', 'MapsController@index');

Route::get('/dashboard/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
