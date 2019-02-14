<?php

namespace App\Http\Controllers;

use Auth;
use App\Lock;
use App\User;
use Carbon\Carbon;


class StatsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('pages/stats/index');
  }
  public function general()
  {
    return view('pages/stats/general');
  }
  public function map()
  {
    return view('pages/stats/map');
  }












}
