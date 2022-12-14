<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@userRegistration');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/products', 'ProductController@index')->name('products');
        Route::get('/products/create', 'ProductController@create')->name('products.create');
        // Route::resource('products', 'ProductController');
        Route::post('/products/store', 'ProductController@store')->name('products.store');
        Route::get('/products/{slug}', 'ProductController@show')->name('products.show');
        Route::get('/products/edit/{slug}', 'ProductController@edit')->name('products.edit');
        Route::put('/products/update/{id}', 'ProductController@update')->name('products.update');
        Route::delete('/products/delete/{id}', 'ProductController@destroy')->name('products.destroy');
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/orders/chart', 'OrderController@chart')->name('orders.chart');
        Route::get('/orders/details/{id}', 'OrderController@show')->name('orders.show');
    });

Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', '.*');
