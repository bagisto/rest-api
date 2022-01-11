<?php

namespace Webkul\RestApi\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RestApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->activateMiddleware();

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

    /**
     * Activate middleware.
     *
     * @return void
     */
    protected function activateMiddleware()
    {
        $router = $this->app['router'];

        $router->aliasMiddleware('sanctum.admin', \Webkul\RestApi\Http\Middleware\AdminMiddleware::class);

        $router->aliasMiddleware('sanctum.customer', \Webkul\RestApi\Http\Middleware\CustomerMiddleware::class);
    }
}
