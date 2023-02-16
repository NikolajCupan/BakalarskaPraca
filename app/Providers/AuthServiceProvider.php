<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserRole;
use App\Models\WebRole;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Allow only users with role 'admin'
        Gate::define('admin', function()
        {
            return Auth::user()->hasRole('admin');
        });

        // Allow only users with role 'accountManager'
        Gate::define('accountManager', function()
        {
            return Auth::user()->hasRole('accountManager');
        });

        // Allow only users with role 'productManager'
        Gate::define('productManager', function()
        {
            return Auth::user()->hasRole('productManager');
        });
    }
}
