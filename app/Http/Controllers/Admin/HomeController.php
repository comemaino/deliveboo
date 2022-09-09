<?php
// USER CONTROLLER
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::findOrFail($id);
        $user = Auth::user();
        $user_id = $user->id;
        $last_30_days = Carbon::now()->subDays(30);
        $last_30_days_orders = Order::where('created_at', '>=', $last_30_days)->where('user_id', $user_id)->get();
        $number_of_last_30_days_orders = count($last_30_days_orders);
        $amount_of_last_30_days_orders = 0;
        foreach($last_30_days_orders as $single_order) {
            $amount_of_last_30_days_orders += $single_order->amount;
        }
        $top_3_products = DB::select("SELECT `product_id`, 
        COUNT(`product_id`) AS `top_3`
        FROM `order_product`
        INNER JOIN `orders` ON `order_product`.`order_id` = `orders`.`id`
        WHERE `orders`.`user_id` = ".$user_id."
        GROUP BY `product_id`
        ORDER BY `top_3` DESC");

        $final_rank = [];
        if (count($top_3_products) <= 3) {
            $final_rank = $top_3_products;
        } else {
            for ($i = 0; $i < 3; $i++) {
                $single_product = $top_3_products[$i];
                $final_rank[] = $single_product;
            }
        }
        
        $final_rank_data = [];
        foreach($final_rank as $product) {
            $product_data = Product::findOrFail($product->product_id);
            $final_rank_data[] = $product_data;
        }
        // dd($final_rank_data);

        return view('admin.home', compact('user', 'user_id', 'number_of_last_30_days_orders', 'amount_of_last_30_days_orders', 'final_rank_data', 'final_rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user_id = Crypt::decrypt($id);
        // $products = Product::where('user_id', '=', $user_id)->get();
        // $user = Auth::user();
        // return view('admin.show', compact('products', 'user', 'user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
