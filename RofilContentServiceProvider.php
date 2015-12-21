<?php

namespace Rofil\Content;

use Illuminate\Support\ServiceProvider;

class RofilContentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'RofilContent');
    }

    public function register()
    {
        
    }
}
