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
            $view->with('auth', auth()->user());
            $view_name = str_replace('.', '_', $view->getName());
            $view->with('view_name', $view_name);
        });

        view()->composer('auth.login', function ($view) {
            if (session()->has('registering')) {
                $view->with('registering', session('registering'));
                session()->forget('registering');
            }
        });
    }
}
