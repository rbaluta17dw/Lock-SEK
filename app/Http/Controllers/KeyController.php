<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Key;
use App\User;
use App\Lock;
use Auth;

class KeyController extends Controller
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


      $keys = Key::where('user_id', Auth::user()->id)->get();

        return view('pages/key/keys',['keys'=>$keys]);
    }




    public function edit($id)
    {
      $key= Key::find($id);

      return view('key.edit')->with('key', $key);
    }



    public function create(Request $request)
    {

        $user = User::find(Auth::user()->id);
        
        $key = new Key; 
        $key->name = $request->input('newKeyName');
        $key->device = 2;
        $key->user_id = $user->id;
        $key->lock_id = 1;
        $hashed = Hash::make($key->device.$key->user_id.$key->lock_id, [
            'rounds' => 12
            ]);
       //Aqui faltan cosas
       $key->save();

       Storage::put("/storage/keys/".time().".key", $hashed);
       
       return Storage::download("/storage/keys/".time().".key");
       


        

    }

    
    public function createView()
    {
        return view('pages/key/createKey');
    }











   
  
}
