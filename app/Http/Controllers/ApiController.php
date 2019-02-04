<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lock;
use App\Key;
use App\Notification;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{

  public function check(Request $request){
    $authorized =false;
    /*if (Lock::where('id',$request->lock_id)->exists()) {
      $lock = Lock::find($request->lock_id);
      foreach ($lock->keys as $key) {
        if ($key->id == $request->keys_id) {
          $authorized =true;
        }
      }
    }*/
    $key = Key::find($request->keyId);
    if (isset($key->device)) {
      if ($key->device == $request->usbId) {
        if (Hash::check($key->user_id.$key->lock_id, $request->hash)) {
          $authorized =true;
          $notification = new Notification;
          $notification->marker = 6;
          $notification->notificable = 0;
          $notification->user_id = $key->user_id;
          $notification->key_id = $key->id;
          $notification->lock_id = $key->lock_id;
          $notification->save();
        }
      }

    }else{
      $key->device = $request->usbId;
      $key->save();
      $authorized = true;
    }

    //$key = Key::where([['device',$request->device],['lock_id',$request->lock_id]])->get();



    if ($authorized) {
      return "true";
    }else {
      return "false";
    }
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $key = Key::find($id);
    return $key;
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
