<?php

namespace PeymanManteali\Likeable;

use Illuminate\Support\ServiceProvider;

class LikeableServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        dd(__DIR__ . '/migrations');
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->publishes([
            realpath(__DIR__ . '/migrations')=>database_path('migrations')
        ], 'migrations');

    }
}
