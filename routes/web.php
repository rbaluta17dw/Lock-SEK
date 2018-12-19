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
    return view('pages/Landing');
});

Route::post('form','FormularioController@insert');
// Route::get('/eventos', ['as'=>'eventos','uses'=>'EventoController@index']);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/settings', 'UserController@settings')->name('settings');
Route::post('/editprf', 'UserController@editprf')->name('editprf');



Route::get('/keys', 'KeyController@index')->name('keys');
Route::get('/keys/create', ['as'=>'keys.create','uses'=>'KeyController@create']);
//Route::get('/keys/{key}/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

Route::get('/key/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);



Route::get('/locks', 'LockController@index')->name('locks');
Route::get('/registerLock', 'LockController@register')->name('registerLock');
Route::get('/lock', 'LockController@profile')->name('lock');
