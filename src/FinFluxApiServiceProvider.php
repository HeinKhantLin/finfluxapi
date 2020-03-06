<?php

namespace HeinKhantLin\FinFluxApi;

use Illuminate\Support\ServiceProvider;

class FinFluxApiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'heinkhantlin');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'heinkhantlin');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/finfluxapi.php', 'finfluxapi');

        // Register the service the package provides.
        $this->app->singleton('finfluxapi', function ($app) {
            return new FinFluxApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['finfluxapi'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/finfluxapi.php' => config_path('finfluxapi.php'),
        ], 'finfluxapi.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/heinkhantlin'),
        ], 'finfluxapi.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/heinkhantlin'),
        ], 'finfluxapi.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/heinkhantlin'),
        ], 'finfluxapi.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
