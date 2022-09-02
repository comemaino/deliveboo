<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($categories_id)
    {
        // dd($categories_id);
        $restaurants = [];
        // return strpos($categories_id, '17') !== false;
        // return strpos($categories_id, '17');
        if ($categories_id === 'null') {
            $restaurants = User::all();
        } else {
            // $category = Category::findOrFail($id);
            // $restaurants = $category->users()->get();
            // foreach($categories_id as $id) {
            //     $category = Category::findOrFail($id);
            //     $restaurants = $category->users()->get();
            // }
            // SELECT  COUNT(*), id, name, business_name, email
            // FROM    users
            // INNER JOIN category_user
            // ON id = user_id
            // WHERE   category_id IN (1,2)
            // GROUP BY id
            // HAVING COUNT(id) = 2
            $categories_as_array = explode(',', $categories_id);
            $counter = count($categories_as_array);
            $restaurants = DB::table('users')
                ->select('id', 'business_name', 'address', 'cover', 'slug')
                ->join('category_user', 'users.id', '=', 'category_user.user_id')
                ->whereIn('category_id', $categories_as_array)
                ->groupBy('id')
                ->having(DB::raw('count(id)'), '=', $counter)
                ->get(); // you may replace this with get()/select()
            // dd(count($restaurants));
        };
        $categories = Category::all();
        return response()->json([
            "success" => true,
            "results" => [
                'restaurants' => $restaurants,
                'categories' => $categories,

            ]
        ]);
    }

    public function show($slug) 
    {
        // dd(intval($id));
        // dd($slug);
        $restaurant = User::where('slug', '=', $slug)->first();
        $products = Product::where('user_id', '=', $restaurant['id'])->get();
        // dd($products);
        return response()->json([
            "success" => true,
            "restaurant" => $restaurant,
            "products" => $products
        ]);
    }
}
