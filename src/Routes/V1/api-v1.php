<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    /**
     * Authentication routes.
     */
    require('auth-routes.php');

    /**
     * Customer routes.
     */
    require('customer-routes.php');
});
