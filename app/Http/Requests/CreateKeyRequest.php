<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateKeyRequest extends FormRequest
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
            'keyName' => ['required',
            'string',
            'max:45',
            'min:4', 
        ],
            'lock'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'keyName.required' => 'El nuevo nombre no puede estar vacio',
            'keyName.min' => 'El nombre debe de tener minimo 4 caracteres',
            'keyName.max' => 'El nombre no puede ser tan largo',
            'lock.required'=>'Selecciona una cerradura',
        ];
    }
}
