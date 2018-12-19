<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockController extends Controller
{
  public function index()
  {
      return view('pages/lock/locks');
  }
  public function register()
  {
      return view('pages/lock/registerLock');
  }
}
