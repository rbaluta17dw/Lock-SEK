<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulario;

class FormularioController extends Controller
{
    
	public function insert(Request $request){


        $datos= new Formulario;

        $datos->nombre=$request->input('nombre');
        $datos->email=$request->input('email');
        $datos->mensaje=$request->input('mensaje');
       

        $datos->save();

        return view ('pages/Landing');

    
}
}
