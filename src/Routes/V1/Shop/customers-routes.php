<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\AddressController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\AuthController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\CartController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\CheckoutController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\InvoiceController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\OrderController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\ShipmentController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\TransactionController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\WishlistController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\NewsLetterController;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\GDPRController;

/**
 * Customer unauthorized routes.
 */
Route::controller(AuthController::class)->prefix('customer')->group(function () {
    Route::post('login', 'login');

    Route::post('register', 'register');

    Route::post('forgot-password', 'forgotPassword');
});

/**
 * News Letter routes.
 */
Route::controller(NewsLetterController::class)->prefix('customer/subscription')->group(function () {
    Route::post('', 'store');
});

/**
 * Customer authorized routes.
 */
Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {
    /**
     * Customer auth routes.
     */
    Route::controller(AuthController::class)->prefix('customer')->group(function () {
        Route::get('get', 'get');

        Route::put('profile', 'update');

        Route::post('logout', 'logout');
    });

    /**
     * Customer address routes.
     */
    Route::controller(AddressController::class)->prefix('customer/addresses')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('', 'store');

        Route::put('{id}', 'update');

        Route::patch('make-default/{id}', 'makeDefault');

        Route::delete('{id}', 'destroy');
    });

    /**
     * Customer sale orders routes.
     */
    Route::controller(OrderController::class)->prefix('customer/orders')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('{id}/cancel', 'cancel');

        Route::get('reorder/{id}', 'reorder');
    });

    /**
     * Customer sale invoices routes.
     */
    Route::controller(InvoiceController::class)->prefix('customer/invoices')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');
    });

    /**
     * Customer sale shipment routes.
     */
    Route::controller(ShipmentController::class)->prefix('customer/shipments')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');
    });

    /**
     * Customer sale transaction routes.
     */
    Route::controller(TransactionController::class)->prefix('customer/transactions')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');
    });

    /**
     * Customer wishlist routes.
     */
    Route::controller(WishlistController::class)->prefix('customer/wishlist')->group(function () {
        Route::get('', 'index');

        Route::post('{id}', 'addOrRemove');

        Route::post('{id}/move-to-cart', 'moveToCart');

        Route::delete('all', 'destroyAll');
    });

    /**
     * Customer cart routes.
     */
    Route::controller(CartController::class)->prefix('customer/cart')->group(function () {
        Route::get('', 'index');

        Route::post('add/{productId}', 'store');

        Route::put('update', 'update');

        Route::delete('remove/{cartItemId}', 'removeItem');

        Route::delete('remove', 'removeAll');

        Route::post('move-to-wishlist/{cartItemId}', 'moveToWishlist');

        Route::post('coupon', 'applyCoupon');

        Route::delete('coupon', 'removeCoupon');
    });

    /**
     * Customer checkout routes.
     */
    Route::controller(CheckoutController::class)->prefix('customer/checkout')->group(function () {
        Route::post('save-address', 'saveAddress');

        Route::post('save-shipping', 'saveShipping');

        Route::post('save-payment', 'savePayment');

        Route::post('check-minimum-order', 'checkMinimumOrder');

        Route::post('save-order', 'saveOrder');
    });

    /**
     * GDPR.
     */
    Route::controller(GDPRController::class)->prefix('customer/gdpr')->group(function () {
        Route::get('', 'allResources');

        Route::get('{id}', 'getResource');

        Route::post('', 'store');

        Route::put('revoke/{id}', 'revoke');
    });

});
