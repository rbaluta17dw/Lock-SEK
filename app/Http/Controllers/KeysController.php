<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeysController extends Controller
{
/* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/key/keys');
    }
}
