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

Route::get('laravel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages/Landing');
});

Route::post('form','FormularioController@insert');
// Route::get('/eventos', ['as'=>'eventos','uses'=>'EventoController@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'DashboardController@profile')->name('profile');
