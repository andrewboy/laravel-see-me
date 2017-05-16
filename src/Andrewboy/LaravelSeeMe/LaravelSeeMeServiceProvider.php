<?php namespace Andrewboy\LaravelSeeMe;

use Illuminate\Support\ServiceProvider;

class LaravelSeeMeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('seeme', function ($app) {
            $apiKey = $app['config']['services.key'];
            $logFileDestination = $app['config']['seeme.log_destination'];
            $format = $app['config']['seeme.format'];
            $method = $app['config']['seeme.method'];

            $seeme = new SeeMeGateway($apiKey, $logFileDestination, $format, $method);

            return $seeme;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['seeme'];
    }

    /**
     * Set service provider
     * @return void
     */
    public function boot()
    {

    }
}