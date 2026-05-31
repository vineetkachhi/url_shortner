<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('super-admin', function ($user) {
            return $user->role === 'SuperAdmin';
        });

        Gate::define('admin', function ($user) {
            return in_array($user->role, ['admin']);
        });

        Gate::define('admin-member', function ($user) {
            return in_array($user->role, ['admin', 'Member']);
        });

        Gate::define('member', function ($user) {
            return $user->role === 'Member';
        });
    }
}
