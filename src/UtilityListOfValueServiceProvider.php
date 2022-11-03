<?php

namespace Corals\Modules\Utility\ListOfValue;

use Corals\Modules\Utility\ListOfValue\Facades\ListOfValues;
use Corals\Modules\Utility\ListOfValue\Providers\UtilityAuthServiceProvider;
use Corals\Modules\Utility\ListOfValue\Providers\UtilityRouteServiceProvider;
use Corals\Settings\Facades\Modules;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class UtilityListOfValueServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'utility-lov');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'utility-lov');

        $this->mergeConfigFrom(
            __DIR__ . '/config/utility_list_of_value.php',
            'utility-list_of_value'
        );
        $this->publishes([
            __DIR__ . '/config/utility-list_of_value.php' => config_path('utility_list_of_value.php'),
            __DIR__ . '/resources/views' => resource_path('resources/views/vendor/utility-lov'),
        ]);

        $this->registerModulesPackages();
    }

    public function register()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);

        $this->app->booted(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('ListOfValues', ListOfValues::class);
        });
    }


    protected function registerModulesPackages()
    {
        Modules::addModulesPackages('corals/utility-lov');
    }
}
