<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Mail\SendMailToAdmin;
use App\Mail\SendMailToGuest;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            "amount" => $request->amount,
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

    public function store(Request $request) 
    {
        $data = $request->all();
        $dataEncoded = json_decode($data['parsed']);
        $productData = $dataEncoded->reducedCart[0];
        $product = Product::findOrFail($productData->id);
        $userId = $product->user_id;
        $thisUser = User::findOrFail($userId);
        $customerData = $dataEncoded->customerData;
        $paymentState = $dataEncoded->paymentState ? 1 : 0;
        $newOrder = [
            "user_id" => $userId,
            "amount" => $dataEncoded->amount,
            "state" => $paymentState,
            "customer_fullname" => $customerData->fullname,
            "customer_email" => $customerData->email,
            "customer_address" => $customerData->address,
            
        ];
        $order = new Order();
        $order->fill($newOrder);
        $order->customer_fullname = $customerData->fullname;
        $order->customer_email = $customerData->email;
        $order->customer_address = $customerData->address;
        $order->save();
        $productsArray = [];
        foreach($dataEncoded->reducedCart as $singleProduct) {
            $productsArray[$singleProduct->id] = [
                "product_quantity" => $singleProduct->quantity,
            ];
        };
        $order->products()->sync($productsArray);
        $msgToAdmin = new SendMailToAdmin($order);
        $msgToGuest = new SendMailToGuest($order, $productsArray);
        Mail::to($thisUser->email)->send($msgToAdmin);
        Mail::to($order->customer_email)->send($msgToGuest);
        return response()->json([
                'success' => true,
                'message' => 'Ordine effettuato'
            ]);
    }
}
