<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/{id}', 'Api\HomeController@index')->name('api.restaurants.index');
Route::get('/{slug}/menu', 'Api\HomeController@show')->name('api.restaurants.show');

Route::get('/orders/generate', 'Api\Orders\OrderController@generate');
Route::post('/orders/make-payment', 'Api\Orders\OrderController@makePayment');
Route::post('/orders/store', 'Api\Orders\OrderController@store');
