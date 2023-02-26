<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use App\Models\Customer;

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
        view()->composer('*', function ($view) {
            $cartItemCount = session()->has('customer') ?  Cart::where('customer_id', session()->get('customer')->customer_id)->count() : 0;
            $view->with('cartItemCount', $cartItemCount);

            if (session()->has('customer')) {
                $user_id = session()->get('customer')->customer_id;
            } else {
                $customer = new Customer();
                $temporaryCustomerID = rand(1,5000).now();
                $customer->customer_id = $temporaryCustomerID;
                session()->put('customer', $customer);
                $user_id = $temporaryCustomerID;
            }

            $view->with('user_id', $user_id);

        });
    }
}
