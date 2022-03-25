<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class PublicacionStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            '*.required' => 'Se esperaba un campo especificando el producto',
            '*.integer' => 'El valor id del producto debe ser un numero',
            '*.exists' => 'El producto no se encuentra en nuestra base de datos',
            '*.unique' => 'Ya existe una publicacion para este producto'
        ];
    }
    
    public function rules()
    {
        return [
            'producto_id' => ['required', 'integer', 'exists:productos,id', Rule::unique('publicaciones')->whereNull('deleted_at')],
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
