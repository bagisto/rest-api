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
     * Customer authentication routes.
     */
    require ('customer-auth-routes.php');

    /**
     * Customer wishlist routes.
     */
    require ('customer-wishlist-routes.php');

    /**
     * Customer address routes.
     */
    require ('customer-address-routes.php');

    /**
     * Customer cart routes.
     */
    require ('customer-cart-routes.php');

    /**
     * Customer checkout routes.
     */
    require ('customer-checkout-routes.php');

    /**
     * Customer checkout routes.
     */
    require ('customer-sale-routes.php');
});
