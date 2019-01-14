<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'email' => 'nullable|email|unique:users',
            'name' => ['nullable',
                      'string',
                      'max:45',
                      'min:4', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-zA-Z0-9_.]+$/'],
            'password' => ['required',
                     'min:6',
                     'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/'],
            'password2' => ['nullable',
                     'min:6',
                     'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/']
        ];
    }


    public function messages()
    {
        return [
            'name.regex' => 'El nombre no acepta caracteres especiales',
            'name.min' => 'El nombre debe de tener minimo 4 caracteres',
            'name.max' => 'El nombre no puede ser tan largo', 
            'password.required' => 'Es necesario introducir la contraseña',
            'password.regex' => 'La contraseña debe contener al menos una letra un numero y un caracter especial "mipassword123!"',
            'password.min' => 'La contraseña debe de tener al menos 6 caracteres',
            'password2.regex' => 'La contraseña debe contener al menos una letra un numero y un caracter especial "mipassword123!"',
            'password2.min' => 'La contraseña debe de tener al menos 6 caracteres'
            
        ];
    }
}
