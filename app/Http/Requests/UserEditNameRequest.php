<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditNameRequest extends FormRequest
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
            'name' => ['nullable',
                      'string',
                      'max:45',
                      'min:4',
                      ]
        ];
    }


    public function messages()
    {
        return [
            'name.min' => 'El nombre debe de tener minimo 4 caracteres',
            'name.max' => 'El nombre no puede ser tan largo',

        ];
    }
}
