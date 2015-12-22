<?php

namespace Rofil\Content;

use Illuminate\Support\ServiceProvider;

class RofilContentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'RofilContent');

        $this->publishes([__DIR__.'/database/migrations'=>database_path("migrations")], "migrations");
    }

    public function register()
    {
        
    }
}
