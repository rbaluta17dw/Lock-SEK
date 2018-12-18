<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
}
