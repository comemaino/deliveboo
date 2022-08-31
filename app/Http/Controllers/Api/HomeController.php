<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = User::all();
        $categories=Category::all();
        return response()->json([
            "success" => true,
            "results" => [
                'restaurants' => $restaurants,
                'categories' => $categories,
                
            ]
        ]);
    }
}
