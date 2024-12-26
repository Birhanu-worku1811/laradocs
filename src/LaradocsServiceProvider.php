<?php

namespace Birhanu\Laradocs;

use Illuminate\Support\ServiceProvider;

class LaradocsServiceProvider extends ServiceProvider
{
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

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laradocs.php' => config_path('laradocs.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/resources/views/custom-ui.blade.php' => resource_path('views/vendor/laradocs/custom-ui.blade.php'),
        ], 'views');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laradocs');
    }
}