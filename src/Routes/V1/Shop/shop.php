<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'v1',
    'middleware' => ['sanctum.locale', 'sanctum.currency'],
], function () {
    /**
     * Core routes.
     */
    require 'core-routes.php';

    /**
     * Catalog routes.
     */
    require 'catalog-routes.php';

    /**
     * Customer routes.
     */
    require 'customer-routes.php';
});
