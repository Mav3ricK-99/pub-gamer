<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
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
            '*.required' => 'Se esperaba el campo :attribute',
            '*.integer' => 'El valor del campo :attribute debe ser un numero entero',
            '*.numeric' => 'El valor del campo :attribute debe ser un numero',
            '*.min' => 'El valor del campo :attribute debe ser como minimo 1',
            '*.max' => 'El valor del campo :attribute debe ser como maximo 12'
        ];
    }
    
    public function rules()
    {
        return [
            'issuer_id' => 'required|integer',
            'payment_method_id' => 'required',
            'transaction_amount' => 'required|numeric|min:1',
            'installments' => 'required|integer|min:1|max:12',
            'token' => 'required',
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
