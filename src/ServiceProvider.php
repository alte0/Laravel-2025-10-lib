<?php

namespace Alte0\Calc;

use Alte0\Calc\Console\Commands\CalculateCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/calculate-lib.php', 'calculate-lib');

        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        $this->loadViewsFrom(__DIR__ . '/../views', 'calculate-lib');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CalculateCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/calculate-lib.php' => config_path('calculate-lib.php')
        ], 'calculate-config');

        $this->publishes([
            __DIR__ . '/../views' => base_path("resources/views/vendor/calculate-lib")
        ], 'calculate-views');
    }
}
