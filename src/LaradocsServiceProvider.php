<?php

namespace Birhanu\Laradocs;

use Illuminate\Support\ServiceProvider;

class LaradocsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/laradocs.php',
            'laradocs'
        );

        $this->app->singleton('laradocs', function ($app) {
            return new LaraDocs();
        });
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laradocs.php' => config_path('laradocs.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}