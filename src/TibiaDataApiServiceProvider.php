<?php

namespace Igorsgm\TibiaDataApi;

use Illuminate\Support\ServiceProvider;

class TibiaDataApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/tibia-data-api.php' => config_path('tibia-data-api.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/tibia-data-api.php', 'tibia-data-api');

        // Register the main class to use with the facade
        $this->app->singleton('tibia-data-api', function () {
            return new TibiaDataApi();
        });
    }
}
