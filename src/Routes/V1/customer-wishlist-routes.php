<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerWishlistController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/wishlist', [CustomerWishlistController::class, 'index']);

    Route::post('customer/wishlist/{id}', [CustomerWishlistController::class, 'addOrRemove']);

    Route::post('customer/wishlist/{id}/move-to-cart', [CustomerWishlistController::class, 'moveToCart']);
});
