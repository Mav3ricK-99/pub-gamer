<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ComentarioStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        //Auth::user()->tokenCan('place-orders') ? true : false;

        return true;
    }

    public function messages()
    {
        return [
            '*.required' => 'Se esperaba el campo :attribute',
            '*.max' => 'Se supero el numero maximo de caracteres',
            '*.exists' => 'La publicacion no se encuentra en nuestra base de datos',
        ];
    }
    
    public function rules()
    {
        return [
            //CUANDO LA PUBLICACION NO ESTA 'ELIMINADA'
            //exists:comentario en respuesta??
            'publicacion_id' => ['required', 'integer', 'exists:publicaciones,id'],
            'mensaje' => 'required|max:255',
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
