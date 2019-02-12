<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditPasswordRequest extends FormRequest
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

            'OldPassword' => ['required',
                     'min:6',
                     'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/'],
            'NewPassword' => ['nullable',
                     'min:6',
                     'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/'],
            'NewPassword' => ['same:NewPassword',
                     'min:6',
                     'regex:/^(?=(.*[a-zA-Z].*){2,})(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{6,15}$/']
        ];
    }


    public function messages()
    {
        return [
            'password.required' => 'Es necesario introducir la contraseña',
            'password.regex' => 'La contraseña debe contener al menos una letra un numero y un caracter especial "mipassword123!"',
            'password.min' => 'La contraseña debe de tener al menos 6 caracteres',
            'password2.regex' => 'La contraseña debe contener al menos una letra un numero y un caracter especial "mipassword123!"',
            'password2.min' => 'La contraseña debe de tener al menos 6 caracteres'

        ];
    }
}
