<?php namespace Andrewboy\LaravelSeeMe;

use Illuminate\Support\ServiceProvider;
use Andrewboy\SeeMe\SeeMeGateway;

class LaravelSeeMeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/seeme.php', 'seeme'
        );

        $this->app->singleton(SeeMeGateway::class, function ($app) {
            $apiKey = $app['config']['services.seeme.key'];
            $logToFile = !is_null($app['config']['seeme.log_to_file'])
                ? $app['config']['seeme.log_to_file']
                : false;
            $format = !is_null($app['config']['seeme.format'])
                ? $app['config']['seeme.format']
                : SeeMeGateway::FORMAT_JSON;
            $method = !is_null($app['config']['seeme.method'])
                ? $app['config']['seeme.method']
                : SeeMeGateway::METHOD_CURL;

            $seeme = new SeeMe($apiKey, $logToFile, $format, $method);


            if ($app->bound(\Psr\Log\LoggerInterface::class)) {
                $seeme->setLogger($app->make(\Psr\Log\LoggerInterface::class));
            }

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
        return [SeeMeGateway::class];
    }

    /**
     * Set service provider
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/seeme.php' => config_path('seeme.php'),
        ], 'config');
    }
}