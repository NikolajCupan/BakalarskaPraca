<?php

namespace App\Providers;

use App\Helpers\Helper;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        // Sends user, basket and imagePath to views
        view()->composer(['main.index', 'main.contact', 'main.about', 'main.terms', 'shop.category',
                          'shop.product', 'user.purchase.purchaseHistory', 'user.purchase.purchaseDetail'], function($view)
        {
            $user = Auth::user();

            // User might not be logged in
            // If image on path does not exist, function returns null
            $imagePath = null;
            $basket = null;
            if (!is_null($user))
            {
                $basket = $user->getCurrentBasket();

                if (Helper::imageExists($user->getImagePath(), 'users'))
                {
                    $imagePath = $user->getImagePath();
                }
            }

            $view->with('imagePath', $imagePath)
                 ->with('user', $user)
                 ->with('basket', $basket);
        });
    }
}
