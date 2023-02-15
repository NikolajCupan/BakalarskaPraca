<?php

namespace App\Providers;

use App\Helpers\Helper;
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
            // If image on path does not exist, function returns null
            $imagePath = null;
            if (!is_null($user))
            {
                if (Helper::imageExists($user->getImagePath()))
                {
                    $imagePath = $user->getImagePath();
                }
            }

            $view->with('imagePath', $imagePath)
                 ->with('user', $user);
        });
    }
}
