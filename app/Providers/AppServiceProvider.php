<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        // Sends user and imagePath to views
        view()->composer(['main.index', 'main.contact', 'main.about', 'shop.category'],function ($view)
        {
            $user = Auth::user();

            // User might not be logged in
            $imagePath = null;
            if (!is_null($user))
            {
                $imagePath = $user->getImagePath();
            }

            $view->with('imagePath', $imagePath)
                 ->with('user', $user);
        });
    }
}
