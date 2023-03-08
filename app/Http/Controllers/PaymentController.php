<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use MercadoPayment\SDK;
use MercadoPayment\Payment;
use MercadoPayment\Payer;

class PaymentController extends Controller
{
    public function verVistaPayment(Request $request){
        return response()->view('Payments.realizarPayment');
    }

    public function realizarPayment(PaymentRequest $request){

        $data = $request->all();

        //5031 7557 3453 0604
        //11/25
        SDK::setAccessToken(config('app.MERCADOPayment_ACCESS_KEY'));

        $payment = new Payment();
        $payment->transaction_amount = (float)$data['transaction_amount'];
        $payment->token = $data['token'];
        $payment->description = "Un producto";
        $payment->installments = (int)$data['installments'];
        $payment->payment_method_id = $data['payment_method_id'];

        $payer = new Payer();
        $payer->email = $request->user()->email;
        $payer->first_name = $request->user()->nombre;

        $payer->identification = array(
            "type" => "DNI",
            "number" => "42000844"
        );

        $payment->payer = $payer;

        $payment->save();

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );

        return response()->json($response);
    }
}
