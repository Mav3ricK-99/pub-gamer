<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Inertia\Inertia;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            '*.email' => 'El :attribute debe ser un email valido',
            '*.required' => 'El campo :attribute es requerido',
            '*.exists' => 'Alguno de los datos son invalidos',
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        Inertia::render('Dashboard/Dasboard', ['errors' => $validator->errors()]);
    }
}
