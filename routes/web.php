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
// Landing Page
Route::get('/', function () {
    return view('pages/Landing');
});
// Post mensaje formaulario contacto
Route::post('form','FormularioController@insert');
// Route::get('/eventos', ['as'=>'eventos','uses'=>'EventoController@index']);

// Rutas autenticacion
Auth::routes();
Auth::routes(['verify' => true]);

// Rutas dashboard
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Rutas Perfil


Route::get('/profile', ['as'=>'profile.index','uses'=>'UserController@index']);
Route::get('/settings', 'UserController@settings')->name('settings');
Route::post('/editprf', 'UserController@editprf')->name('editprf');



//Rutas llaves
Route::get('/keys', ['as'=>'keys.index','uses'=>'KeyController@index']);
Route::get('/keys/create', ['as'=>'keys.create','uses'=>'KeyController@create']);
Route::get('/keys/createView', ['as'=>'keys.createView','uses'=>'KeyController@createView']);
Route::get('/keys/{key}/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

//Route::get('/key/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

//Rutas cerraduras

Route::get('/locks', 'LockController@index')->name('locks');
Route::get('/registerLock', 'LockController@register')->name('locks');
