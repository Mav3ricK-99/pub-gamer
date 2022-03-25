<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PermisoStoreRequest extends FormRequest
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
            '*.exists' => 'El Rol no se encuentra en la Base de datos',
            '*.unique' => 'Ya existe un permiso con ese nombre'
        ];
    }

    public function rules()
    {
        return [
            'permiso' => 'required|min:3|unique:permisos',
            'rol' => 'required|integer|exists:user_roles,descripcion'
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
