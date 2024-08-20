<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user){
            return $user->user_level == 1;
        });
        Gate::define('isVendor', function ($user){
            return $user->user_level == 2;
        });
        Gate::define('isCustomer', function ($user){
            return $user->user_level == 5;
        });
        Gate::define('notAdmin', function ($user) {
            return in_array($user->user_level, [2,5]);
        });
        Gate::define('AllUser', function ($user) {
            return in_array($user->user_level, [2,5,1]);
        });
    }
}
