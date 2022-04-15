<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Inertia\Inertia;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            '*.email' => 'El :attribute debe ser un email valido!',
            '*.required' => 'El campo :attribute es requerido!',
            '*.min' => 'El campo :attribute debe tener al menos 3 caracteres',
            '*.confirmed' => 'Se esperaba la re-validacion de el campo :attribute',
            'email.unique' => 'El email ya se encuentra en nuestra base de datos'
        ];
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'nombre' => 'required|min:3',
            'password' => 'required|confirmed|min:4',
        ];
    }

    public function failedValidation(Validator $validator)
    { 
        Inertia::render('Dashboard/Dasboard', ['errors' => $validator->errors()]);
    }
}
