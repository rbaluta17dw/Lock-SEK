<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Lock;
use App\User;
use App\Http\Requests\EditLockRequest;
use App\Http\Requests\CreateLockRequest;
use App\Notification;
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
    $lock->latitude = $request->input('latitude');
    $lock->longitude = $request->input('longitude');
    $lock->user_id = Auth::user()->id;
    $lock->save();

    $notification = new Notification;
    $notification->title = "Se ha creado la cerradura ".$lock->name;
    $notification->message = "Has creado la cerradura ".$lock->name." el ".date("Y-m-d H:i:s");
    $notification->marker = 3;
    $notification->read = 1;
    $notification->user_id = Auth::user()->id;
    $notification->lock_id = $lock->id;
    $notification->save();
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
  
  public function updateLocation($id, $lat, $lng){
    $lock=Lock::find($id);
    $lock->latitude = $lat;
    $lock->longitude = $lng;
    $lock->save();

    return "Ubicacion actualizada";
  }

  public function update(EditLockRequest $request, $id)
  {
    
    $validated = $request->validated();
    $lock=Lock::find($id);
    
    $lock->name = $request->input('newLockName');

    $notification = new Notification;
    $notification->title = "Se ha actualizado la cerradura ".$lock->name;
    $notification->message = "Has actualizado el nombre de la cerradura ".$lock->name." el ".date("Y-m-d H:i:s");
    $notification->marker = 0;
    $notification->read = 1;
    $notification->user_id = Auth::user()->id;
    $notification->lock_id = $lock->id;
    $notification->save();
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
    $nomMod = "basico";
    $notification = new Notification;
    $notification->title = "Se ha añadido permisos en la cerradura ".$lock->name;
    $notification->message = "Has dado permiso a".$email." con permiso ".$nomMod." en la cerradura ".$lock->name." el ".date("Y-m-d H:i:s");
    $notification->marker = 0;
    $notification->read = 1;
    $notification->user_id = Auth::user()->id;
    $notification->lock_id = $lock->id;
    $notification->save();
    return redirect()->action('LockController@show',['lock'=>$lock]);
  }
  
  public function deletePrivilege($lock, $user)
  {
    $lockd = Lock::find($lock);
    $lockd->privileges()->detach($user);
    $notification = new Notification;
    $notification->title = "Se ha quitado permisos en la cerradura ".$lockd->name;
    $notification->message = "Has quitado permiso a".$lockd->email." en la cerradura ".$lockd->name." el ".date("Y-m-d H:i:s");
    $notification->marker = 0;
    $notification->read = 1;
    $notification->user_id = Auth::user()->id;
    $notification->lock_id = $lockd->id;
    $notification->save();
    return redirect()->action('LockController@show',['lock'=>$lockd]);
  }
  
}
