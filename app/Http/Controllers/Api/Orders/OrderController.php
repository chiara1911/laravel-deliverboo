<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Dish;
class OrderController extends Controller
{
    //

    public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data =[
            'success'=>true,
            'token'=>$token
        ];
    //    dd($gateway->clientToken()) ;
      
        return response ()->json($data, 200);
    }
    public function makePayment(OrderRequest $request, Gateway $gateway){
        $dish = Dish::find($request->dish);
        $result= $gateway->transaction()->sale([
            'amount'=> $dish->price,
            'paymentMethodNonce'=>$request->token,
            'options'=>[
                'submitForSettlement'=>true
            ],
        ]);
        if ($result->success){
            $data =[
                'success'=>true,
                'message'=> "Transazione avvenuta con successo",
            ];
            return response ()->json($data,200);
        } else {
            $data =[
                'success'=>false,
                'message'=> "Transazione fallita",
            ];
            return response ()->json($data, 401);
        }
        return 'makePayment';
    }
}
