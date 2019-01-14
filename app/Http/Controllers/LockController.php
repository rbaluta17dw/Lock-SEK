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

      //añadir a la tabla privileges

      return redirect()->action('LockController@show', ['id' => $newLock]);
      //return view('pages/lock/lock',['lock'=>$lock]);
  }

  public function show($id)
  {

      if (Lock::where('id',$id)->exists()) {
        $lock= Lock::find($id);
        if (Auth::user()->id == $lock->user_id) {
          return view('pages/lock/lock',['lock'=>$lock]);
        }else{
          abort(404);
        }

      }else{
        abort(404);
      }


  }

  public function update(Request $request, $id)
  {
    $lock=Lock::find($id);

    $lock->name = $request->input('newLockName');

    $lock->save();


    return view('pages/lock/lock',['lock'=>$lock]);

  }

  public function destroy($id)
  {



      $lock = Lock::find($id);
      $lock->delete();


      $keys = Key::where('user_id', Auth::user()->id)->get();

      return view('pages/key/keys',['keys'=>$keys]);;

  }


}
