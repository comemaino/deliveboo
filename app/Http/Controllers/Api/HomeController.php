<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = User::all();
        return response()->json([
            "success" => true,
            "results" => $restaurants
        ]);
    }
}
