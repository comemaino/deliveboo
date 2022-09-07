<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Gateway $gateway, Request $request)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            "token" => $token,
        ];
        return response()->json($data, 200);
    }

    public function makePayment(Gateway $gateway, OrderRequest $request)
    {
        $result = $gateway->transaction()->sale([
            "amount" => "10.00",
            "paymentMethodNonce" => $request->token,
            "options" => [
                "submitForSettlement" => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data, 401);
        }
    }
}
