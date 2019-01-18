<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Lock;
use App\Key;
use App\Form;
use Hash;


class AdminController extends Controller
{

  public function __construct()
  {
    $this->middleware('admin');
  }
  public function index()
  {
    $users = User::select('id')->count();
    $locks = Lock::select('id')->count();
    $keys = Key::select('id')->count();
    //$users = User::select('id')->count();
    $messages = Form::select('id')->count();


    return view('pages/admin/dashboard',['users'=>$users,'locks'=>$locks,'keys'=>$keys, 'messages'=>$messages]);
  }
  public function users()
  {
    $users = User::all();
    $button = true;
    return view('pages/admin/users',['users'=>$users,'button'=>$button]);
  }
  public function messages()
  {
    $messages = Form::all();
    return view('pages/admin/messages',['messages'=>$messages]);
  }
  public function usersDeleted()
  {
    $users = User::onlyTrashed()->get();
    $button = false;
    return view('pages/admin/users',['users'=>$users,'button'=>$button]);
  }
  public function user($id)
  {
    $user = User::withTrashed()->find($id);

    return view('pages/admin/user',['user'=>$user]);
  }
  public function newUser()
  {
    return view('pages/admin/newUser');
  }
  public function insertUser(Request $request)
  {
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->roleId = $request->input('role');
    $user->save();

    $newUser = User::where('email',$request->input('email'))->first();

    return view('pages/admin/user',['user'=>$newUser]);
  }
  public function userDelete($id)
  {
    User::find($id)->delete();
    //$user = User::onlyTrashed()->find($id);
    return redirect()->action('AdminController@user', ['id' => $id]);
    //return view('pages/admin/user',['user'=>$user]);
  }
  public function userRecover($id)
  {
    User::onlyTrashed()->find($id)->restore();
    //$user = User::find($id);
    return redirect()->action('AdminController@user', ['id' => $id]);
    //return view('pages/admin/user',['user'=>$user]);
  }
  public function userEdit(Request $request, $id)
  {
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    $user = User::find($id);
    if ($name != '') {
      $user->name = $name;
    }
    if ($email != '') {
      $user->email = $email;
    }
    if ($password != '') {
      $user->password = Hash::make($password);
    }
    $user->save();
    return view('pages/admin/user',['user'=>$user]);
  }
  public function userEditImg(Request $request, $id)
  {
    $image = $request->file('img');
    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
    $request->file('img')->storeAs('public/avatars', $input['imagename']);

    $user = User::find($id);
    if ($user->imgname != '') {
      Storage::delete('avatars/'.$user->imgname);
    }
    $user->imgname = $input['imagename'];
    $user->save();
    Auth::login($user);
    return view('pages/admin/user',['user'=>$user]);
  }
  public function keys()
  {
    $keys = Key::all();
    return view('pages/admin/keys',['keys'=>$keys]);
  }
  public function key($id)
  {
    $key = Key::find($id);
    return view('pages/admin/key',['key'=>$key]);
  }
  public function newKey()
  {
    $locks = Lock::all();
    $user = User::all();
    return view('pages/admin/newKey',['locks'=>$locks, 'users'=>$user]);
  }
  public function insertKey(Request $request)
  {
    $key = new Key;
    $key->name = $request->input('name');
    $key->device = rand(10000, 999999999);
    $key->user_id = $request->input('user');
    $key->lock_id = $request->input('lock');
    $key->save();
    $keys = Key::all();
    return view('pages/admin/keys',['keys'=>$keys]);
  }
  public function locks()
  {
    $locks = Lock::all();
    return view('pages/admin/locks',['locks'=>$locks]);
  }
  public function newLock()
  {
    $locks = Lock::all();
    $user = User::all();
    return view('pages/admin/newLock',['locks'=>$locks, 'users'=>$user]);
  }
  public function insertLock(Request $request)
  {
    $lock = new Lock;
    $lock->name = $request->input('name');
    $lock->serial_n = $request->input('serial_n');
    $lock->user_id = $request->input('user');
    $lock->save();
    $locks = Lock::all();
    return view('pages/admin/locks',['locks'=>$locks]);
  }
  public function lockDelete($id){
    Lock::find($id)->delete();
    return view('pages/admin/dashboard');
  }
  public function lockUpdate(Request $request, $id){
    $lock=Lock::find($id);

    $lock->name = $request->input('newLockName');

    $lock->save();


    return view('pages/admin/lock',['lock'=>$lock]);
  }
  public function lockInsertPrivilege(Request $request, $id)
  {
    $lock = Lock::find($id);
    $email = $request->input('email');
    $mod = $request->input('role');
    $user = User::where('email', $email)->get();
    $lock->privileges()->attach($user,['privilege' => $mod]);

    return redirect()->action('AdminController@lock',['id'=>$lock->id]);
  }
  public function lock($id)
  {
    $lock = Lock::find($id);
    return view('pages/admin/lock',['lock'=>$lock]);
  }
}
