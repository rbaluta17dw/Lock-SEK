<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLockRequest extends FormRequest
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
            'newLockName' => ['required',
            'string',
            'max:45',
            'min:4', 
            'regex:/^(?!.*__.*)(?!.*\.\..*)[a-zA-Z0-9_.\s]+$/'],

            

        ];
    }


    public function messages()
    {
        return [
            'newLockName.required' => 'El nuevo nombre no puede estar vacio',
            'newLockName.regex' => 'El nombre no acepta caracteres especiales',
            'newLockName.min' => 'El nombre debe de tener minimo 4 caracteres',
            'newLockName.max' => 'El nombre no puede ser tan largo',
            
        ];
    }




}
