<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'v1/admin',
    'middleware' => ['sanctum.locale'],
], function () {
    /**
     * Authentication routes.
     */
    require 'auth-routes.php';

    /**
     * Sale routes.
     */
    require 'sale-routes.php';

    /**
     * Catalog routes.
     */
    require 'catalog-routes.php';

    /**
     * Customer routes.
     */
    require 'customer-routes.php';

    /**
     * Velocity routes.
     */
    require 'velocity-routes.php';

    /**
     * Marketing routes.
     */
    require 'marketing-routes.php';

    /**
     * CMS routes.
     */
    require 'cms-routes.php';

    /**
     * Setting routes.
     */
    require 'setting-routes.php';

    /**
     * Configuration routes.
     */
    require 'configuration-routes.php';
});
