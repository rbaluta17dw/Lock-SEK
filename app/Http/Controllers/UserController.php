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

    $validatedData = $request->validate([
      'email' => 'nullable|email|unique:users',
      'name' => ['nullable',
                'string',
                'max:45',
                'min:4',
<<<<<<< HEAD
                'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.]+$'],
=======
                'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.]+$/'],
>>>>>>> 05689e1d75d50b68955f2acc6aa3310b0e718c78

      'password' => ['required',
               'min:6',
               'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/'],

      'password2' => ['nullable',
               'min:6',
<<<<<<< HEAD
               'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$']
=======
               'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/']
>>>>>>> 05689e1d75d50b68955f2acc6aa3310b0e718c78

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
  public function editImg(Request $request)
  {
      $image = $request->file('img');
      $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
      $request->file('img')->storeAs('public/avatars', $input['imagename']);

      $user = User::find(Auth::user()->id);
      if ($user->imgname != '') {
        Storage::delete('avatars/'.$user->imgname);
      }
      $user->imgname = $input['imagename'];
      $user->save();
      Auth::login($user);
      return view('pages/user/profile');
  }
}
