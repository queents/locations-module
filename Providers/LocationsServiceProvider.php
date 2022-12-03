<?php

namespace Modules\Locations\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Base\Services\Components\Base\Lang;
use Modules\Base\Services\Core\VILT;
use Modules\Locations\Console\InstallLocations;

class LocationsServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Locations';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'locations';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        VILT::loadResources($this->moduleName);
        VILT::loadPages($this->moduleName);

        $this->commands([
            InstallLocations::class
        ]);

        VILT::registerTranslation(Lang::make('countries.sidebar')->label(__('Countries')));
        VILT::registerTranslation(Lang::make('cities.sidebar')->label(__('Cities')));
        VILT::registerTranslation(Lang::make('areas.sidebar')->label(__('Area')));
        VILT::registerTranslation(Lang::make('languages.sidebar')->label(__('Languages')));
        VILT::registerTranslation(Lang::make('currencies.sidebar')->label(__('Currencies')));
        VILT::registerTranslation(Lang::make('locations_settings.sidebar')->label(__('Location Settings')));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }



    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
