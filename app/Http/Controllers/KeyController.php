<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages/key/createKey');
    }
}
