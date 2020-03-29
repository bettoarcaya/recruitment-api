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
            'Person.*.firstname' => 'required',
            'Person.*.lastname' => 'required',
            'Person.*.email' => 'required|unique:people',
            'Person.*.gender' => 'required',
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
            'Person.*.firstname.required' => 'Este campo es requerido',
            'Person.*.lastname.required' => 'Este campo es requerido',
            'Person.*.email.required' => 'Este campo es requerido',
            'Person.*.email.unique' => 'Ya existe un usuario con este correo',
            'Person.*.gender.required' => 'Este campo es requerido',
        ];
    }
}
