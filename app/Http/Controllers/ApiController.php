<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lock;
use App\Key;

class ApiController extends Controller
{

  public function check(Request $request){
    $lockKey =false;
    if (Lock::where('id',$request->lock_id)->exists()) {
      $lock = Lock::find($request->lock_id);
      foreach ($lock->keys as $key) {
        if ($key->id == $request->keys_id) {
          $lockKey =true;
        }
      }
    }
    if ($lockKey) {
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
