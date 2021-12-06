<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerCartController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/cart', [CustomerCartController::class, 'get']);

    Route::post('customer/cart/add/{productId}', [CustomerCartController::class, 'add']);

    Route::put('customer/cart/update', [CustomerCartController::class, 'update']);

    Route::delete('customer/cart/remove/{cartItemId}', [CustomerCartController::class, 'removeItem']);

    Route::delete('customer/cart/empty', [CustomerCartController::class, 'empty']);

    Route::post('customer/cart/move-to-wishlist/{cartItemId}', [CustomerCartController::class, 'moveToWishlist']);

    Route::post('customer/cart/coupon', [CustomerCartController::class, 'applyCoupon']);

    Route::delete('customer/cart/coupon', [CustomerCartController::class, 'removeCoupon']);
});
