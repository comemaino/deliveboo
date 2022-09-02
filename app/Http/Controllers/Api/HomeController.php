<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
        $restaurants = [];
        if($id == 17) {
            $restaurants = User::all();
        } else {
            $category = Category::findOrFail($id);
            $restaurants = $category->users()->get();
            // foreach($categories_id as $id) {
            //     $category = Category::findOrFail($id);
            //     $restaurants = $category->users()->get();
            // }
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
}
