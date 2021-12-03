<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerCartController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/cart', [CustomerCartController::class, 'get']);

    Route::post('customer/cart/add/{id}', [CustomerCartController::class, 'add']);

    Route::put('customer/cart/update', [CustomerCartController::class, 'update']);

    Route::get('customer/cart/empty', [CustomerCartController::class, 'empty']);

    Route::get('customer/cart/remove-item/{id}', [CustomerCartController::class, 'removeItem']);

    Route::post('customer/cart/coupon', [CustomerCartController::class, 'applyCoupon']);

    Route::delete('customer/cart/coupon', [CustomerCartController::class, 'removeCoupon']);

    Route::get('customer/cart/move-to-wishlist/{id}', [CustomerCartController::class, 'moveToWishlist']);
});
