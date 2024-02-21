<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class OrderController extends Controller
{
    public function generateToken(Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'token' => $token,
            'success' => true
        ];

        return response()->json($data, 200);
    }

    public function payment(Request $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->paymentMethodNonce,
            'options' => [
                'submitForSettlement' => true
            ],
        ]);
        if ($result->success) {
            $data = [
                'success' => true,
                'message' => "Transazione avvenuta con successo",
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => $result->message,
            ];
            return response()->json($data, 401);
        }
    }


}