<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        //
        Validator::extend('pp_price_calculation', function ($attribute, $value, $parameters, $validator) {
            $ppd_amount = $validator->getData()['ppd_amount'];
            $ppd_price = $validator->getData()['ppd_price'];

            return $value == $ppd_amount * $ppd_price;
        });
    }
}
