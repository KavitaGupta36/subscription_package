<?php

namespace Hestalabs\Subscription;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->loadViewsFrom(__DIR__.'/Views', 'subscripton');
        
        // Publish the config file
        $this->publishes([
            __DIR__.'/../config/subscription.php' => config_path('subscription.php'),
        ], 'config');

        // Publish the migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations')
        ], 'migrations');
        // Publish the view file 
        $this->publishes([
            __DIR__.'/Views/' => base_path('resources/views'),
        ]);
        
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->make('Hestalabs\Subscription\Controllers');
    }
}
