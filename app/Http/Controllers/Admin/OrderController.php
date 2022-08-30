<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Order::where('user_id', '=', $user_id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders', 'user', 'user_id'));
    }
}
