<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);   ;

        Gate::define('admin-only', function ($user) {
            return $user->role === 'admin';
        });

        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
