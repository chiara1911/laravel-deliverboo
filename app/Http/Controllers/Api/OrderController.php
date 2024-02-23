<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\GuestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\Dish;
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

        foreach ($data['dishes'] as $dish) {

            $newOrder->dishes()->attach($dish['dish_id'], ['quantity' => $dish['quantity']]);
        }

        // Mail::to('admin@example.com')->send(new AdminMail($newOrder));
        // Mail::to($data['email'])->send(new GuestMail($newOrder));

        $emails = ['admin@example.com', $data['email']];

        foreach ($emails as $email) {
            if($email === 'admin@example.com') {
                Mail::to($email)->send(new AdminMail($newOrder));
            } else {
                Mail::to($email)->send(new GuestMail($newOrder));
            }
        }

        // try {
        //     Mail::to($email)->send(new GuestMail($newOrder));
        // } catch (\Exception $e) {

        //     return response()->json([
        //         'success' => false
        //     ]);
        // }

        return response()->json([
            'success' => true
        ]);


    }
}
