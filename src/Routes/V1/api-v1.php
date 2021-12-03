<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    /**
     * Customer authentication routes.
     */
    require('customer-auth-routes.php');

    /**
     * Customer address routes.
     */
    require('customer-address-routes.php');

    /**
     * Customer cart routes.
     */
    require('customer-cart-routes.php');

    /**
     * Customer checkout routes.
     */
    require('customer-checkout-routes.php');
});
