<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Order::where('user_id', '=', $user_id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders', 'user', 'user_id'));
    }

    public function chart() 
    {
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Order::where('user_id', '=', $user_id)->get();

        $orders_date = DB::select('SELECT SUM(`amount`) AS `orders_amount`, MONTH(`orders`.`created_at`) AS `months` FROM `orders` WHERE `user_id` = '.$user_id.' GROUP BY `months` ORDER BY `months`');
        // dd($orders_date);
        $sales = [];
        foreach($orders_date as $order) {
            $sales[] = $order->orders_amount;
        }
        // dd($orders_date);

        $data = Order::select('id','created_at', 'amount')->where('user_id', $user_id)->orderBy('created_at', 'ASC')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months=[];
        $orders_n=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $orders_n[]=count($values);
        };
        
        return view('admin.orders.chart',['data'=>$data,'months'=>$months,'orders_n'=>$orders_n, 'sales'=>$sales ]);

        // return response()->json('orders_date');
        // return view('admin.orders.chart');
    }
}
