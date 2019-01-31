<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLockRequest extends FormRequest
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
            'lockName' => ['required',
            'string',
            'max:45',
            'min:4', 
            'regex:/^(?!.*__.*)(?!.*\.\..*)[a-zA-Z0-9_.\s]+$/'],
            'lockSerial' => ['required',
                      'string',
                      'max:15',
                      'min:15', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-zA-Z0-9]+$/'],
        ];
    }
    public function messages()
    {
        return [
            'lockName.required' => 'El nuevo nombre no puede estar vacio',
            'lockName.regex' => 'El nombre no acepta caracteres especiales',
            'lockName.min' => 'El nombre debe de tener minimo 4 caracteres',
            'lockName.max' => 'El nombre no puede ser tan largo',
            
            'lockSerial.required' => 'Es necesario introducir un numero de serie',
            'lockSerial.regex' => 'El numero de serie no es correcto',
            'lockSerial.min' => 'El numero de serie no es correcto',
            'lockSerial.max' => 'El numero de serie no es correcto'
        ];
    }
}
