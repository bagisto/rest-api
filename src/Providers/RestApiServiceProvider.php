<?php

namespace Webkul\RestApi\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webkul\Core\Exceptions\Handler as BaseHandler;
use Webkul\RestApi\Exceptions\Handler;

class RestApiServiceProvider extends ServiceProvider
{
    /**
     * Register your middleware aliases here.
     *
     * @var array
     */
    protected $middlewareAliases = [
        'etag'             => \Webkul\RestApi\Http\Middleware\ETagMiddleware::class,
        'sanctum.admin'    => \Webkul\RestApi\Http\Middleware\AdminMiddleware::class,
        'sanctum.customer' => \Webkul\RestApi\Http\Middleware\CustomerMiddleware::class,
        'sanctum.locale'   => \Webkul\RestApi\Http\Middleware\LocaleMiddleware::class,
        'sanctum.currency' => \Webkul\RestApi\Http\Middleware\CurrencyMiddleware::class,
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->activateMiddlewareAliases();

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'rest-api');

        $this->app->bind(BaseHandler::class, Handler::class);

        $this->publishes([
            __DIR__.'/../Config/l5-swagger.php' => config_path('l5-swagger.php'),
        ], 'bagisto-rest-api-swagger');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mapApiRoutes();

        $this->registerCommands();
    }

    /**
     * Activate middleware aliases.
     *
     * @return void
     */
    protected function activateMiddlewareAliases()
    {
        collect($this->middlewareAliases)->each(function ($className, $alias) {
            $this->app['router']->aliasMiddleware($alias, $className);
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware(['api', 'etag'])
            ->group(__DIR__.'/../Routes/api.php');
    }

    /**
     * Register the console commands of this package.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Webkul\RestApi\Console\Commands\Install::class,
            ]);
        }
    }
}
