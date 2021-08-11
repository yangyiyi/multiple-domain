<?php

namespace YangYiYi\MultipleDomain;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/web.php' => config_path('/domain/web.php'),
                __DIR__ . '/../config/api.php' => config_path('/domain/api.php'),
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/web.php',
            'domain.web'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../config/api.php',
            'domain.api'
        );
    }
}
