<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    /**
     * Core routes.
     */
    require ('core-routes.php');

    /**
     * Catalog routes.
     */
    require ('catalog-routes.php');

    /**
     * Customer routes.
     */
    require ('customer-routes.php');
});
