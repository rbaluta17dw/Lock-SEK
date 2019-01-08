<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    //$user = User::find(Auth::user()->id);


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
  public function delete()
  {
    $user = User::find(Auth::user()->id);
    Auth::logout($user);
    $user->delete();


    return view('pages/Landing');
  }
  public function editImg(Request $request)
  {
      $image = $request->file('img');
      $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
      $request->file('img')->storeAs('public/avatars', $input['imagename']);

      $user = User::find(Auth::user()->id);
      if ($user->imgname != null) {
        Storage::delete('avatars/'.$user->imgname);
      }
      $user->imgname = $input['imagename'];
      $user->save();
      Auth::login($user);
      return view('pages/user/profile');
  }
}
