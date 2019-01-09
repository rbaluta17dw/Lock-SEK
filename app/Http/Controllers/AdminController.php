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
    return view('pages/admin/users');
  }
}
