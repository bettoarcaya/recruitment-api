<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:people',
            'gender' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Este campo es requerido',
            'lastname.required' => 'Este campo es requerido',
            'email.required' => 'Este campo es requerido',
            'email.unique' => 'Ya existe un usuario con este correo',
            'gender.required' => 'Este campo es requerido',
        ];
    }
}
