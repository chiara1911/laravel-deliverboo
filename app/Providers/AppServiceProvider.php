<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' =>'sandbox',
                    'merchantId' => '3c588sqhrj2cjxx2',
                    'publicKey' => 'jmr9mc9knjq8857p',
                    'privateKey' => '1d5e4738d63153a152aac65676cd90fc'
                ]
            );
        });
    }
}
