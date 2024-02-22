<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();

        // Mail::to('info@boolfolio.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true
        ]);


    }
}
