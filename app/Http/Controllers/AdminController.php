<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Lock;
use App\Key;

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



    return view('pages/admin/dashboard',['users'=>$users,'locks'=>$locks,'keys'=>$keys]);
  }
  public function users()
  {
    $users = User::all();
    return view('pages/admin/users',['users'=>$users]);
  }
  public function user($id)
  {
    $user = User::find($id);

    return view('pages/admin/user',['user'=>$user]);
  }
  public function keys()
  {
    $keys = Key::all();
    return view('pages/admin/keys',['keys'=>$keys]);
  }
  public function key()
  {
    return view('pages/admin/key');
  }
  public function locks()
  {
    $locks = Lock::all();
    return view('pages/admin/locks',['locks'=>$locks]);
  }
  public function lock()
  {
    return view('pages/admin/lock');
  }
}
