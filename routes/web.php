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
// Post mensaje formulario contacto
Route::post('/form',['as'=>'form.insert','uses'=>'FormController@insert']);
// Route::get('/eventos', ['as'=>'eventos','uses'=>'EventoController@index']);
Route::get('/password/reset', function () {
    return view('resources/views/auth/passwords');
});
// Rutas autenticacion
Auth::routes();
Auth::routes(['verify' => true]);

// Rutas dashboard

Route::get('/home', ['as'=>'home.index','uses'=>'HomeController@index']);
Route::get('/dashboard', ['as'=>'dashboard.index','uses'=>'DashboardController@index']);

// Rutas Notificaciones
Route::get('/notifications', function () {
    return view('pages/notification/notifications');
});

// Idiomas
Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  $cookie = cookie('language', $lang, 43200);
  return \Redirect::back()->cookie($cookie);
})->middleware('web')->name('change_lang');

Route::get('/liveStats', ['as'=>'liveStats','uses'=>'StatsController@index'])->middleware('admin');

//admin
Route::get('/admin/dashboard', ['as'=>'admin.index','uses'=>'AdminController@index'])->middleware('admin');
Route::get('/admin/users', ['as'=>'admin.users','uses'=>'AdminController@users'])->middleware('admin');
Route::get('/admin/users/deleted', ['as'=>'admin.users.deleted','uses'=>'AdminController@usersDeleted'])->middleware('admin');
Route::get('/admin/user/{id}', ['as'=>'admin.user','uses'=>'AdminController@user'])->middleware('admin');
Route::get('/admin/usernew', ['as'=>'admin.user.new','uses'=>'AdminController@newUser'])->middleware('admin');
Route::post('/admin/userinsert', ['as'=>'admin.user.insert','uses'=>'AdminController@insertUser'])->middleware('admin');
Route::post('/admin/user/recover/{id}', ['as'=>'admin.userDelete','uses'=>'AdminController@userRecover'])->middleware('admin');
Route::post('/admin/user/edit/{id}', ['as'=>'admin.userEdit','uses'=>'AdminController@userEdit'])->middleware('admin');
Route::post('/admin/user/editimg/{id}', ['as'=>'admin.userEditImg','uses'=>'AdminController@userEditImg'])->middleware('admin');
Route::post('/admin/user/delete/{id}', ['as'=>'admin.userDelete','uses'=>'AdminController@userDelete'])->middleware('admin');
Route::get('/admin/keys', ['as'=>'admin.keys','uses'=>'AdminController@keys'])->middleware('admin');
Route::get('/admin/newKey', ['as'=>'admin.key.new','uses'=>'AdminController@newKey'])->middleware('admin');
Route::post('/admin/insertKey', ['as'=>'admin.key.insert','uses'=>'AdminController@insertKey'])->middleware('admin');
Route::get('/admin/key/{id}', ['as'=>'admin.key','uses'=>'AdminController@key'])->middleware('admin');
Route::get('/admin/locks', ['as'=>'admin.locks','uses'=>'AdminController@locks'])->middleware('admin');
Route::get('/admin/newLock', ['as'=>'admin.lock.new','uses'=>'AdminController@newLock'])->middleware('admin');
Route::post('/admin/insertLock', ['as'=>'admin.lock.insert','uses'=>'AdminController@insertLock'])->middleware('admin');
Route::get('/admin/lock/{id}', ['as'=>'admin.lock','uses'=>'AdminController@lock'])->middleware('admin');
Route::post('/admin/lock/delete/{id}', ['as'=>'admin.lock.delete','uses'=>'AdminController@lockDelete'])->middleware('admin');
Route::put('/admin/locks/{lock}', ['as'=>'admin.locks.update','uses'=>'AdminController@lockUpdate'])->middleware('admin');
Route::post('/admin/locks/{lock}/insertPrivilege', ['as'=>'admin.locks.insertPrivilege','uses'=>'AdminController@lockInsertPrivilege'])->middleware('admin');
Route::get('/admin/messages', ['as'=>'admin.messsages','uses'=>'AdminController@messages'])->middleware('admin');

// Rutas Perfil


Route::get('/profile', ['as'=>'profile.index','uses'=>'UserController@index']);
Route::get('/settings', ['as'=>'profile.settings','uses'=>'UserController@settings']);
Route::post('/editprf', ['as'=>'profile.edit','uses'=>'UserController@editprf'])->middleware('verified');
Route::post('/editImg', ['as'=>'profile.editImg','uses'=>'UserController@editImg']);
Route::post('/delete', ['as'=>'profile.delete','uses'=>'UserController@delete']);


//Rutas llaves
Route::get('/keys', ['as'=>'keys.index','uses'=>'KeyController@index'])->middleware('verified');
Route::get('/keys/create', ['as'=>'keys.create','uses'=>'KeyController@create'])->middleware('verified');// vista crear
Route::post('/keys', ['as'=>'keys.store','uses'=>'KeyController@store'])->middleware('verified'); //crear llave
//Route::get('/keys/createView', ['as'=>'keys.createView','uses'=>'KeyController@createView'])->middleware('verified');
Route::get('/keys/{key}/edit', ['as'=>'keys.edit','uses'=>'KeyController@edit'])->middleware('verified');
Route::put('/keys/{key}', ['as'=>'keys.update','uses'=>'KeyController@update'])->middleware('verified');
Route::delete('/keys/{key}', ['as'=>'keys.destroy','uses'=>'KeyController@destroy'])->middleware('verified');

//Rutas cerraduras
Route::get('/locks', ['as'=>'locks.index','uses'=>'LockController@index'])->middleware('verified');
Route::get('/locks/register', ['as'=>'locks.register','uses'=>'LockController@register'])->middleware('verified');
Route::post('/locks/create', ['as'=>'locks.create','uses'=>'LockController@create'])->middleware('verified');
Route::get('/locks/{lock}', ['as'=>'locks.show','uses'=>'LockController@show'])->middleware('verified');
Route::put('/locks/{lock}', ['as'=>'locks.update','uses'=>'LockController@update'])->middleware('verified');
Route::get('/locks/{lock}/deleteLocation', ['as'=>'locks.deleteLocation','uses'=>'LockController@deleteLocation'])->middleware('verified');
Route::get('/locks/{lock}/{lat}/{lng}', ['as'=>'locks.updateLocation','uses'=>'LockController@updateLocation'])->middleware('verified');
Route::delete('/locks/{lock}', ['as'=>'locks.destroy','uses'=>'LockController@destroy'])->middleware('verified');
//Privilegios
Route::post('/locks/{lock}/insertPrivilege', ['as'=>'locks.insertPrivilege','uses'=>'LockController@insertPrivilege'])->middleware('verified');
Route::get('/locks/{lock}/{user}/delete', ['as'=>'locks.deletePrivilege','uses'=>'LockController@deletePrivilege'])->middleware('verified');


// rutas Notificaciones

Route::get('/notifications', 'AjaxController@getNotifications')->name('notifications');
