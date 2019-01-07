<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('pages/user/profile');
  }
  public function settings()
  {
    return view('pages/user/settings');
  }
  public function editprf(Request $request)
  {


    $validatedData = $request->validate([
      'email' => 'nullable|email|unique:users',
      'name' => 'nullable|string|max:45',

      'password' => ['required', 
               'min:6', 
               'regex:/^[a-zA-Z0-9]{6,45}$/'],

      'password2' => ['nullable', 
               'min:6', 
               'regex:/^[a-zA-Z0-9]{6,45}$/']
      
  ]);


    $name = $request->input('name');
    $email = $request->input('email');
    $passwordold = $request->input('password');
    $passwordnew = $request->input('password2');


   

    $user = User::find(Auth::user()->id);
    if ($name != '') {
      $user->name = $name;
    }
    if ($email != '') {
      $user->email = $email;
    }


    if ($passwordnew != '') {
      $user->password = Hash::make($passwordnew);
    }


    $user->save();

    Auth::login($user);

    return view('pages/user/profile');
  }
  public function delete()
  {
    $user = User::find(Auth::user()->id);
    Auth::logout($user);
    $user->delete();


    return view('pages/Landing');
  }
}
