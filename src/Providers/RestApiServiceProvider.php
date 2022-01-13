<?php

namespace Webkul\RestApi\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RestApiServiceProvider extends ServiceProvider
{
    /**
     * Register your middleware here.
     *
     * @var array
     */
    protected $middlewares = [
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
        $this->activateMiddlewares();

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'rest-api');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mapApiRoutes();
    }

    /**
     * Activate middleware.
     *
     * @return void
     */
    protected function activateMiddlewares()
    {
        $router = $this->app['router'];

        collect($this->middlewares)->each(function ($className, $alias) use ($router) {
            $router->aliasMiddleware($alias, $className);
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
            ->middleware('api')
            ->group(__DIR__ . '/../Routes/api.php');
    }
}
