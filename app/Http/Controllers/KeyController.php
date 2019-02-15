<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\KeyEditRequest;
use App\Http\Requests\CreateKeyRequest;
use App\Key;
use App\User;
use App\Lock;
use App\Notification;
use Auth;
class KeyController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $keys = Key::where('user_id', Auth::user()->id)->get();
    return view('pages/key/userKeys',['keys'=>$keys]);
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('pages/key/userCreate');
  }
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CreateKeyRequest $request)
  {
    $validated = $request->validated();
    $user = User::find(Auth::user()->id);
    $keys = Key::where(['lock_id' => $request->input('lock'), 'user_id' => $user->id])->count();
    if ($user->roleId == 0 && $keys >= 2) {

    }else {
      $key = new Key;
      $key->name = $request->input('keyName');
      $key->user_id = $user->id;
      $key->lock_id = $request->input('lock');
      $notification = new Notification;
      $notification->title = "Se ha creado la llave ".$key->name;
      $notification->message = "Has creado la llave ".$key->name." para la cerradura ".$key->lock->name." el ".date("Y-m-d H:i:s");
      $notification->marker = 2;
      $notification->notificable = 1;
      $notification->user_id = Auth::user()->id;
      $notification->lock_id = $key->lock->id;
      $hashed = Hash::make($key->user_id.$key->lock_id, [
        'rounds' => 12
      ]);

      $key->save();
      $notification->key_id = $key->id;
      $notification->save();
      $finalkey = $key->id."?".$hashed;
      //Storage::put("/storage/keys/prueba.key", $finalkey);
      Storage::put("/storage/keys/".time().".key", $finalkey);
      return Storage::download("/storage/keys/".time().".key");
    }
  }

  public function edit($id)
  {
    if (Key::where('id',$id)->exists()) {
      $key= Key::find($id);
      if (Auth::user()->id == $key->user_id) {
        return view('pages/key/userEditKey')->with('key', $key);
      }else{
        abort(404);
      }
    }else{
      abort(404);
    }
  }
  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(KeyEditRequest $request, $id)
  {
    $validated = $request->validated();
    if (Key::where('id',$id)->exists()) {
      $key=Key::find($id);
      if (Auth::user()->id == $key->user_id){
        $notification = new Notification;
        $notification->title = "Se ha actualizado la llave ".$key->name;
        $notification->message = "Has actualizado la llave ".$key->name." para la cerradura ".$key->lock->name." el ".date("Y-m-d H:i:s");
        $notification->marker = 2;
        $notification->notificable = 1;
        $notification->user_id = Auth::user()->id;
        $notification->lock_id = $key->lock->id;
        $notification->key_id = $key->id;
        $notification->save();
        $key->name = $request->input('newKeyName');
        $key->save();
        //return view('pages/key/editKey',['key'=>$key]);
        return redirect()->action('KeyController@edit',['key'=>$key]);
      }else{
        abort(404);
      }
    }else{
      abort(404);
    }
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    if (Key::where('id',$id)->exists()) {
      $key = Key::find($id);
      if (Auth::user()->id == $key->user_id){
        $notification = new Notification;
        $notification->title = "Se ha eliminado la llave ".$key->name;
        $notification->message = "Has eliminado la llave ".$key->name." para la cerradura ".$key->lock->name." el ".date("Y-m-d H:i:s");
        $notification->marker = 2;
        $notification->notificable = 1;
        $notification->user_id = Auth::user()->id;
        $notification->lock_id = $key->lock->id;
        $notification->key_id = $key->id;
        $notification->save();
        $key->delete();
        $keys = Key::where('user_id', Auth::user()->id)->get();
        //return view('pages/key/keys',['keys'=>$keys]);
        return redirect()->action('KeyController@index');
      }else{
        abort(404);
      }
    }else{
      abort(404);
    }
  }
}
