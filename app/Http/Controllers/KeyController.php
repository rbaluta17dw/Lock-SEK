<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Key;

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

        $keys=Key::all();
        return view('pages/key/keys',['keys'=>$keys]);
    }

    public function edit($id)
    {
      $key= Key::find($id);

      return view('key.edit')->with('key', $key);
    }



    public function create()
    {


        $key = new Key; 
        $key->name = $request->input('newKeyName');
       //Aqui faltan cosas
        $key->save(); 

        return view ('keys.index'); 

    }

    
    public function createView()
    {
        return view('pages/key/createKey');
    }











   
  
}
