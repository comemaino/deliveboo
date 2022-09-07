<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app) {
            return $gateway = new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'cqhsk88mw7tbwkd6',
                'publicKey' => '2n7ts5wq4t52mb4c',
                'privateKey' => 'ac644e0e48f5a43c8f85a18596deaffc'
              ]);
              
        });
    }
}
