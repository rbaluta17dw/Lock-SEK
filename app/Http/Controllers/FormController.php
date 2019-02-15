<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
        
	public function insert(ContactFormRequest $request){
                
                $validated = $request->validated();
                
                
                $data= new Form;
                
                $data->name = $request->input('name');
                $data->email = $request->input('email');
                $data->message = $request->input('message');
                
                
                
                $data->save();
                $request->session()->flash('messageOk', 'Mensaje enviado con exito');
                
                
                
                //return view('pages/Landing');
                
                return redirect('/');
                
        }
}
