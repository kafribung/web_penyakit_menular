<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/admin', 'AdminController');
    Route::resource('/quote', 'QuoteController');
    Route::resource('/artikel', 'ArtikelController');
    Route::resource('/about', 'AboutController');
});

Route::get('/artikel-without-route', 'ArtikelWithOutController@index');
Route::get('/artikel-without-route/create', 'ArtikelWithOutController@create');
Route::post('/artikel-without-route', 'ArtikelWithOutController@store');
Route::get('/artikel-without-route/{id}/edit', 'ArtikelWithOutController@edit');
Route::put('/artikel-without-route/{id}', 'ArtikelWithOutController@update');
Route::delete('/artikel-without-route/{id}', 'ArtikelWithOutController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/penyakit', 'PenyakitController@index');
Route::get('/penyakit/show/{title}', 'PenyakitController@show');
Route::get('/tentang', 'TentangController@index');
Route::get('/motivasi', 'MotivasiController@index');

Auth::routes();

