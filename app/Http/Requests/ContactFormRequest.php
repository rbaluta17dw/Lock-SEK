<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
            'email' => 'required|email|unique:users',
            'name' => ['nullable', 
                      'string',
                      'max:45',
                      'min:1', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-z0-9_.\s]+$/']
      
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Es necesairo introducir el email',
            'email.email' => 'El email no es valido',
            'name.min' => 'El nombre debe de tener minimo 4 caracteres',
            'name.max' => 'El nombre no puede ser tan largo', 
            'name.regex' => 'No se aceptan caracteres especiales'
            
            
        ];
    }
}