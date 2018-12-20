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
<<<<<<< HEAD
//Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> e94e04ea81f65b5a5f33d8bd8bb21f05b8b1bf11
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Rutas Perfil
Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/settings', 'UserController@settings')->name('settings');
Route::post('/editprf', 'UserController@editprf')->name('editprf');
Route::post('/delete', 'UserController@delete')->name('delete');


Route::get('/keys', 'KeyController@index')->name('keys');
Route::get('/keys/create', ['as'=>'keys.create','uses'=>'KeyController@create']);
//Route::get('/keys/{key}/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);

Route::get('/key/edit', ['as'=>'key.edit','uses'=>'KeyController@edit']);



Route::get('/locks', 'LockController@index')->name('locks');
<<<<<<< HEAD
Route::get('/registerLock', 'LockController@register')->name('registerLock');
Route::get('/lock', 'LockController@profile')->name('lock');
=======
Route::get('/registerLock', 'LockController@register')->name('locks');
>>>>>>> e94e04ea81f65b5a5f33d8bd8bb21f05b8b1bf11
