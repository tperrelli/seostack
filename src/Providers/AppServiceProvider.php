<?php

namespace Tperrelli\SeoStack\Providers;

use Tperrelli\SeoStack\SeoStack;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConfigs();

        $this->loadMigrations();

        $this->loadViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSeo();
        
        $this->loadHelpers();
    }

    protected function loadConfigs()
    {
        $this->publishes([
            __DIR__ . '/../../config/seostack.php' => config_path('seostack.php')
        ]);
    }

    protected function loadMigrations()
    {
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ]);
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'seostack');
        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/seostack')
        ]);
    }

    protected function registerSeo()
    {
        $this->app->singleton('seostack', function($app) {
            return new SeoStack($app);
        });
    }

    /**
     * Load the helpers file.
     */
    private function loadHelpers()
    {
        //
    }
}
