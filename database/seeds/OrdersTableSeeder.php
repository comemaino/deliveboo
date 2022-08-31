<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            "user_id" => 1,
            "amount" => 21.99,
            "state" => 1,
            "customer_fullname" => "Ciccio",
            "customer_email" => "ciccio@email.it",
            "customer_address" => "via isonzo"
        ];

        $new_order = new Order();
        $new_order->user_id = $order["user_id"];
        $new_order->amount = $order["amount"];
        $new_order->state = $order["state"];
        $new_order->customer_fullname = $order["customer_fullname"];
        $new_order->customer_email = $order["customer_email"];
        $new_order->customer_address = $order["customer_address"];
        $new_order->save();
    }
}
