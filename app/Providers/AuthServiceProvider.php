<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\WebRole;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('administrate', function(User $user) {
            $adminRole = WebRole::where('name', '=', 'admin')->first();

            // Check if user is admin
            $isAdmin = UserRole::where('id_user', '=', $user->id_user)
                               ->where('id_role', '=', $adminRole->id_role)
                               ->exists();

            return $isAdmin;
        });
    }
}
