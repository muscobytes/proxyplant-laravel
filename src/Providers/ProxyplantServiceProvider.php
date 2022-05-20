<?php

namespace Muscobytes\ProxyplantLaravel\Providers;

use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Muscobytes\Proxyplant\Interfaces\ProxyProviderInterface;
use Muscobytes\Proxyplant\Proxyplant;
use Muscobytes\ProxyplantLaravel\ProxyplantDecorator;

class ProxyplantServiceProvider extends ServiceProvider
{
    protected bool $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/proxyplant.php','proxyplant'
        );
        $this->app->singleton(ProxyplantDecorator::class, function ($app) {
            return new ProxyplantDecorator(new Proxyplant(config('proxyplant')), $app->make(Repository::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/proxyplant.php' => config_path('proxyplant.php'),
        ], 'proxyplant-config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['proxyplantdecorator'];
    }
}
