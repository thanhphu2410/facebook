<?php

namespace App\Providers;

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
        view()->composer('*', function ($view) {
            $view->with('current_user', auth()->user());
        });

        view()->composer('auth.login', function ($view) {
            if (session()->has('registering')) {
                $view->with('registering', session('registering'));
                session()->forget('registering');
            }
        });
    }
}
