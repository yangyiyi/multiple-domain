<?php

namespace YangYiYi\MultipleDomain;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
        }
    }

    public function register()
    {
    }
}
