<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Lock;
use App\User;
use App\Http\Requests\EditLockRequest;
use App\Http\Requests\CreateLockRequest;

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

  public function create(CreateLockRequest $request)
  {
      $validated = $request->validated();
      $lock = new Lock;
      $lock->name = $request->input('lockName');
      $lock->serial_n = $request->input('lockSerial');
      $lock->address = $request->input('address');
      $lock->user_id = Auth::user()->id;
      $lock->save();

      $newLock = Lock::where('serial_n',$request->input('lockSerial'))->first();

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

  public function update(EditLockRequest $request, $id)
  {

    $validated = $request->validated();
    $lock=Lock::find($id);

    $lock->name = $request->input('newLockName');

    $lock->save();


    return view('pages/lock/lock',['lock'=>$lock]);

  }

  public function destroy($id)
  {


          $lock = Lock::findOrFail($id);
          if (Auth::user()->id == $lock->user_id){
              $lock->delete();
              return redirect()->action('LockController@index');
          }else{
              abort(404);
          }

  }
  public function insertPrivilege(Request $request, $id)
  {
    $lock = Lock::find($id);
    $email = $request->input('email');
    $mod = $request->input('role');
    $user = User::where('email', $email)->get();
    $lock->privileges()->attach($user,['privilege' => $mod]);

    return redirect()->action('LockController@show',['lock'=>$lock]);
}
public function deletePrivilege($lock, $user)
{
  $lockd = Lock::find($lock);
  $lockd->privileges()->detach($user);

  return redirect()->action('LockController@show',['lock'=>$lockd]);
}

}
