<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
            'password' => 'required|confirmed',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Error en la validacion',
            'data'      => $validator->errors()
        ]));
    }
}
