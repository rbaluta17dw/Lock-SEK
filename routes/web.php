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

Route::get('/home', ['as'=>'home.index','uses'=>'HomeController@index']);
Route::get('/dashboard', ['as'=>'dashboard.index','uses'=>'DashboardController@index']);


// Rutas Perfil


Route::get('/profile', ['as'=>'profile.index','uses'=>'UserController@index']);
Route::get('/settings', ['as'=>'profile.settings','uses'=>'UserController@settings']);
Route::post('/editprf', ['as'=>'profile.edit','uses'=>'UserController@editprf'])->middleware('verified');
Route::post('/editImg', ['as'=>'profile.editImg','uses'=>'UserController@editImg']);
Route::post('/delete', ['as'=>'profile.delete','uses'=>'UserController@delete']);


//Rutas llaves
Route::get('/keys', ['as'=>'keys.index','uses'=>'KeyController@index'])->middleware('verified');
Route::get('/keys/create', ['as'=>'keys.create','uses'=>'KeyController@create'])->middleware('verified');
Route::get('/keys/createView', ['as'=>'keys.createView','uses'=>'KeyController@createView'])->middleware('verified');
Route::get('/keys/{key}/edit', ['as'=>'key.edit','uses'=>'KeyController@edit'])->middleware('verified');

//Route::get('/key/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

//Rutas cerraduras

Route::get('/locks', 'LockController@index')->name('locks')->middleware('verified');
Route::get('/registerLock', 'LockController@register')->name('registerLock')->middleware('verified');
Route::get('/lock', 'LockController@profile')->name('lock')->middleware('verified');

// rutas Notificaciones

Route::get('/notifications', 'AjaxController@getNotifications')->name('notifications');
