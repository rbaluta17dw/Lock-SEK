<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      return view('pages/dashboard');
  }
  public function userIndex()
  {
      return view('pages/userDashboard');
  }

  public function profile()
  {
    return view('pages/user/profile');
  }
}
