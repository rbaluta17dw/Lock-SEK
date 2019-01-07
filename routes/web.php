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

<<<<<<< HEAD

=======
>>>>>>> 90287a3755ae70666b5dcf003409a10d273b8131

Route::get('/profile', ['as'=>'profile.index','uses'=>'UserController@index']);
Route::get('/settings', ['as'=>'profile.settings','uses'=>'UserController@settings']);
Route::post('/editprf', ['as'=>'profile.edit','uses'=>'UserController@editprf']);
Route::post('/delete', ['as'=>'profile.delete','uses'=>'UserController@delete']);


//Rutas llaves
Route::get('/keys', ['as'=>'keys.index','uses'=>'KeyController@index']);
Route::get('/keys/create', ['as'=>'keys.create','uses'=>'KeyController@create']);
Route::get('/keys/createView', ['as'=>'keys.createView','uses'=>'KeyController@createView']);
Route::get('/keys/{key}/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

//Route::get('/key/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

//Rutas cerraduras

Route::get('/locks', 'LockController@index')->name('locks');
Route::get('/registerLock', 'LockController@register')->name('registerLock');
Route::get('/lock', 'LockController@profile')->name('lock');
