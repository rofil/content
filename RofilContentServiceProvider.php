<?php

namespace Rofil\Content;

use Illuminate\Support\ServiceProvider;

class RofilContentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'RofilContent');

        $this->publishes([
            __DIR__.'/database/migrations'=>database_path("migrations")
        ], "migrations");

        $this->publishes([
            __DIR__.'/public'=>public_path("rofil-content")
        ], "public");

        $this->publishes([
            __DIR__.'/config/menu-admin-content.php'=>config_path("menu-admin-content.php")
        ], 'config');
    }

    public function register()
    {
        $this->app->bind(
            'Rofil\Content\Entity\Contracts\NewsInterface',
            'Rofil\Content\Entity\Eloquent\NewsRepository'
        );

        $this->app->bind(
            'Rofil\Content\Entity\Contracts\NewsCategoryInterface',
            'Rofil\Content\Entity\Eloquent\NewsCategoryRepository'
        );

        $this->app->bind(
            'Rofil\Content\Entity\Contracts\TopicInterface',
            'Rofil\Content\Entity\Eloquent\TopicRepository'
        );

        $this->app->bind(
            'Rofil\Content\Entity\Contracts\InformationInterface',
            'Rofil\Content\Entity\Eloquent\InformationRepository'
        );

        $this->app->bind("menu_content", function($app){
            $app['menus']->add(config("menu-admin-content"), "content") ;
        });
        $this->app->tag(['menu_content'], 'menus');
    }
}
