<?php

declare(strict_types = 1);

namespace Centrex\LaravelCountries;

use Illuminate\Support\ServiceProvider;

class LaravelCountriesServiceProvider extends ServiceProvider
{
    /** Bootstrap the application services. */
    public function boot(): void
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'countries');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'countries');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('countries.php'),
            ], 'countries-config');

            $this->publishes([
                __DIR__ . '/../database/migrations/' => database_path('migrations'),
            ], 'countries-migrations');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/countries'),
            ], 'countries-views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/countries'),
            ], 'countries-assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/countries'),
            ], 'countries-lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /** Register the application services. */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'countries');
    }
}
