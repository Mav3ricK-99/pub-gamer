<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class ProductoRequest extends FormRequest
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
            '*.min' => 'El :attribute debe ser mayor a 2 caracteres!',
            '*.required' => 'El campo :attribute es requerido!',
            '*.integer' => 'El campo :attribute debe ser un valor entero!',
            '*.numeric' => 'El campo :attribute debe ser un numero!',
            '*.max' => 'El campo :attribute debe tener como maximo 255 caracteres!',
            '*.unique' => 'El producto ya se encuentra en el sistema'
        ];
    }
    
    public function rules()
    {
        return [
            'nombreProducto' => 'required|max:255|min:3|unique:productos',
            'stock' => 'required|max:255|integer',
            'precio' => 'required|numeric',
            'categoria' => 'required|max:255|min:3',
            'fabricante' => 'required|max:255|min:2',
            'descripcion' => 'required|max:255|min:3',
            'sku' => 'required|max:255|min:3',
            'garantia' => 'required|integer'
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
