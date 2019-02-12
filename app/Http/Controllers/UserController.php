<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserEditNameRequest;
use App\Http\Requests\UserEditPasswordRequest;
use App\Http\Requests\UserEditEmailRequest;


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
  public function editprfname(UserEditNameRequest $request)
  {
    $validated = $request->validated();

    $name = $request->input('name');

    $user = User::find(Auth::user()->id);


      if ($name != '') {
        $user->name = $name;
      }

      $notification = new Notification;
      $notification->title = "Se ha editado el perfil";
      $notification->message = "Has editado el perfil el ".date("Y-m-d H:i:s");
      $notification->marker = 1;
      $notification->notificable = 1;
      $notification->user_id = Auth::user()->id;
      $notification->save();
      $user->save();

      Auth::login($user);

      $request->session()->flash('success', 'Cambios guardados con exito');
      // return view('pages/user/profile');
      return back();

    //return view('pages/user/profile');
    return back();

  }
  public function editprfemail(UserEditEmailRequest $request)
  {
    $validated = $request->validated();

    $email = $request->input('email');
    $password = $request->input('password');

    $user = User::find(Auth::user()->id);

    if (Hash::check($password, $user->password)) {
      if(User::where('email',$email)->doesntExist()){
      $user->email = $email;

      $notification = new Notification;
      $notification->title = "Se ha cambiado el email";
      $notification->message = "Has cambiado el email de la cuenta el ".date("Y-m-d H:i:s");
      $notification->marker = 1;
      $notification->notificable = 1;
      $notification->user_id = Auth::user()->id;
      $notification->save();
      $user->save();

      Auth::login($user);

      $request->session()->flash('success', 'Email cambiado con exito');
      // return view('pages/user/profile');
      return back();
      }
      $request->session()->flash('failure', 'El email ya existe');
      return back();
    }

    $request->session()->flash('failure', 'La contraseña introducida es erronea');
    //return view('pages/user/profile');
    return back();

  }
  public function editprfpassword(UserEditPasswordRequest $request)
  {
    $validated = $request->validated();

    $oldPassword = $request->input('OldPassword');
    $newPassword = $request->input('NewPassword');
    $newPasswordConfirm = $request->input('NewPasswordConfirm');

    $user = User::find(Auth::user()->id);
    $oldHashedPassword=$user->password;

    if (Hash::check($oldPassword, $oldHashedPassword)) {

      $user->password = Hash::make($newPassword);

      $notification = new Notification;
      $notification->title = "Se ha cambiado la contraseña";
      $notification->message = "Has cambiado la contraseña de la cuenta el ".date("Y-m-d H:i:s");
      $notification->marker = 1;
      $notification->notificable = 1;
      $notification->user_id = Auth::user()->id;
      $notification->save();
      $user->save();

      Auth::login($user);

      $request->session()->flash('success', 'Contraseña cambiada con exito');
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
    $notification = new Notification;
    $notification->title = "Se ha eliminado el perfil";
    $notification->message = "Has eliminado el perfil el ".date("Y-m-d H:i:s");
    $notification->marker = 1;
    $notification->notificable = 1;
    $notification->user_id = Auth::user()->id;
    $notification->save();
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

  public function premium(){
    return view('pages/user/premium');
  }
  public function makePremium(){
    $user = User::find(Auth::user()->id);
    if ($user->roleId == 0) {
      $user->roleId = 1;
    }else {
      $user->roleId = 0;
    }
    $user->save();
    return redirect('home');
  }
}
