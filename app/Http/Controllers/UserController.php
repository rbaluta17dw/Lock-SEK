<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserEditRequest;


class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {

    return view('pages/user/userProfile');
  }

  public function settings()
  {
    return view('pages/user/settings');
  }
  public function editprf(UserEditRequest $request)
  {
    $validated = $request->validated();


    $name = $request->input('name');
    $email = $request->input('email');
    $passwordnew = $request->input('password2');


    $user = User::find(Auth::user()->id);
    $oldPassword=$user->password;


    if (Hash::check($request->password, $oldPassword)) {
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

      $request->session()->flash('success', 'Cambios guardados con exito');
      // return view('pages/user/profile');
      return back();
    }

    $request->session()->flash('failure', 'Contraseña erronea, los cambios no se han guardado');
    //return view('pages/user/profile');
    return back();

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
