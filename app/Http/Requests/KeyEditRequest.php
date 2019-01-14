<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeyEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'newKeyName' => ['nullable',
                      'string',
                      'max:45',
                      'min:4', 
                      'regex:/^(?!.*__.*)(?!.*\.\..*)[a-zA-Z0-9_.]+$/']
           
        ];
    }

    public function messages()
    {
        return [
            'newKeyName.regex' => 'El nombre no acepta caracteres especiales',
            'newKeyName.min' => 'El nombre debe de tener minimo 4 caracteres',
            'newKeyName.max' => 'El nombre no puede ser tan largo'
        ];
    }
}
