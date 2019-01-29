<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Key;
use App\Lock;
use Auth;


class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */

  public function index()
  {
    $locks=Lock::where('user_id', Auth::user()->id)->count();
    $keys = Key::where('user_id', Auth::user()->id)->count();

      return view('pages/userDashboard',['locks'=>$locks, 'keys'=>$keys]);
  }

  public function profile()
  {
    return view('pages/user/profile');
  }
}
