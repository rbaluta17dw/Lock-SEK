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
           
            'email' => 'required|email',
            'name' => ['required', 
                      'string',
                      'max:45',
                      'min:1', ],
            'message'=>['required',
                      'string',
                      'max:190',
                      'min:1',],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Es necesario introducir el email',
            'email.email' => 'El email no es valido',
            'name.required' => 'Es necesario introducir un nombre',
            'name.min' => 'El nombre debe de tener minimo 4 caracteres',
            'name.max' => 'El nombre no puede ser tan largo',
            'message.required' => 'Es necesario introducir un mensaje',
            'message.max' => 'El nombre no puede ser tan largo',
            'message.max' => 'El mensaje no puede ser tan largo', 
            
            
            
        ];
    }
}
