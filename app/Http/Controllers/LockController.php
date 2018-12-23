<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lock;

class LockController extends Controller
{
  public function index()
  {
    $locks=Lock::all();
    return view('pages/lock/locks',['locks'=>$locks]);
  }
  public function register()
  {
      return view('pages/lock/registerLock');
  }
  public function profile()
  {
      return view('pages/lock/lock');
  }
}
