<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    
	public function insert(Request $request){
        
                $validatedData = $request->validate([
                        'email' => 'nullable|email|unique:users',
                        'name' => ['nullable', 
                                  'string',
                                  'max:45',
                                  'min:1', 
                                  'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/'],
                  
                        'message' => ['required', 
                                 'min:1', 
                                 'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/'],
                                
                        
                    ]);




                    $this->validate(
                        $request, 
                        ['thing' => 'required'],
                        ['thing.required' => 'this is my custom error message for required']
                    );


                    
        $data= new Form;

        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->message = $request->input('message');



        $data->save();

        
        return view('pages/Landing');
    
        }
}
