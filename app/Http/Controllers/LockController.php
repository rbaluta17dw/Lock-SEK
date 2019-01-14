<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Lock;

class LockController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $locks=Lock::where('user_id', Auth::user()->id)->get();
    return view('pages/lock/locks',['locks'=>$locks]);
  }

  public function register()
  {
      return view('pages/lock/registerLock');
  }

  public function create(Request $request)
  {
      $lock = new Lock;
      $lock->name = $request->input('name');
      $lock->serial_n = $request->input('numSerie');
      $lock->user_id = Auth::user()->id;
      $lock->save();

      $newLock = Lock::where('serial_n',$request->input('numSerie'))->first();
      return redirect()->action('LockController@show', ['id' => $newLock]);
      //return view('pages/lock/lock',['lock'=>$lock]);
  }

  public function show($id)
  {
      $lock= Lock::find($id);
      if (Auth::user()->id == $lock->user_id) {
        return view('pages/lock/lock',['lock'=>$lock]);
      }else{
        abort(404);
      }

  }

  public function edit($id)
  {
    $lock= Lock::find($id);

    return view('lock.edit')->with('lock', $lock);
  }
}
