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
    $userLastDay = User::where('created_at', '>=', Carbon::now()->subDay())->count();
    return view('pages/stats/liveStats',['userLastDay'=>$userLastDay]);
  }












}
