<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RoleStoreRequest extends FormRequest
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

    public function messages()
    {
        return [
            '*.required' => 'El campo :attribute es requerido!',
            '*.min' => 'El campo :attribute debe tener al menos 3 caracteres',
            '*.unique' => 'Ya existe un Rol con ese nombre'
        ];
    }

    public function rules()
    {
        return [
            'descripcion' => 'required|min:3|unique:roles',
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
