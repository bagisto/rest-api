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

/**
 * Customer unauthorized routes.
 */
Route::controller(AuthController::class)->prefix('customer')->group(function () {
    Route::post('login', 'login')->name('shop.customer.login');

    Route::post('register', 'register')->name('shop.customer.register');

    Route::post('forgot-password', 'forgotPassword')->name('shop.customer.forgot-password');
});

/**
 * Customer authorized routes.
 */
Route::group(['middleware' => ['auth:sanctum', 'sanctum.customer']], function () {
    /**
     * Customer auth routes.
     */
    Route::controller(AuthController::class)->prefix('customer')->group(function () {
        Route::get('get', 'get')->name('shop.customer.get');

        Route::put('profile', 'update')->name('shop.customer.update');
    
        Route::post('logout', 'logout')->name('shop.customer.logout');
    });

    /**
     * Customer address routes.
     */
    Route::controller(AddressController::class)->prefix('customer/addresses')->group(function () {
        Route::get('', 'allResources')->name('shop.customer.addresses.all-resources');

        Route::get('{id}', 'getResource')->name('shop.customer.addresses.get-resources');

        Route::post('', 'store')->name('shop.customer.addresses.store');

        Route::put('{id}', 'update')->name('shop.customer.addresses.update');
 
        Route::delete('{id}', 'destroy')->name('shop.customer.addresses.destroy');
    });

    /**
     * Customer sale orders routes.
     */
    Route::controller(OrderController::class)->prefix('customer/orders')->group(function () {
        Route::get('', 'allResources')->name('shop.customer.sales.orders.all-resources');

        Route::get('{id}', 'getResource')->name('shop.customer.sales.orders.get-resources');
    
        Route::post('{id}/cancel', 'cancel')->name('shop.customer.sales.orders.cancel');
    });
    
    /**
     * Customer sale invoices routes.
     */
    Route::controller(InvoiceController::class)->prefix('customer/invoices')->group(function () {
        Route::get('', 'allResources')->name('shop.customer.sales.invoices.all-resources');
    
        Route::get('{id}', 'getResource')->name('shop.customer.sales.invoices.get-resource');
    });
    
    /**
     * Customer sale shipment routes.
     */
    Route::controller(ShipmentController::class)->prefix('customer/shipments')->group(function () {
        Route::get('', 'allResources')->name('shop.customer.sales.shipments.all-resource');

        Route::get('{id}', 'getResource')->name('shop.customer.sales.shipments.get-resource');
    });

    /**
     * Customer sale transaction routes.
     */
    Route::controller(TransactionController::class)->prefix('customer/transactions')->group(function () {
        Route::get('', 'allResources')->name('shop.customer.sales.transactions.all-resource');

        Route::get('{id}', 'getResource')->name('shop.customer.sales.transactions.get-resource');    
    });

    /**
     * Customer wishlist routes.
     */
    Route::controller(WishlistController::class)->prefix('customer/wishlist')->group(function () {
        Route::get('', 'index')->name('shop.customer.wishlist.index');

        Route::post('{id}', 'addOrRemove')->name('shop.customer.wishlist.add-or-remove');
    
        Route::post('{id}/move-to-cart', 'moveToCart')->name('shop.customer.wishlist.move-to-cart');
    });

    /**
     * Customer cart routes.
     */
    Route::controller(CartController::class)->prefix('customer/cart')->group(function () {
        Route::get('', 'get')->name('shop.customer.cart.get');

        Route::post('add/{productId}', 'add')->name('shop.customer.cart.add');
    
        Route::put('update', 'update')->name('shop.customer.cart.update');
    
        Route::delete('remove/{cartItemId}', 'removeItem')->name('shop.customer.cart.remive-item');
    
        Route::delete('empty', 'empty')->name('shop.customer.cart.empty');
    
        Route::post('move-to-wishlist/{cartItemId}', 'moveToWishlist')->name('shop.customer.cart.move-to-wishlist');
    
        Route::post('coupon', 'applyCoupon')->name('shop.customer.cart.apply-coupon');
    
        Route::delete('coupon', 'removeCoupon')->name('shop.customer.cart.remove-coupon');
    });

    /**
     * Customer checkout routes.
     */
    Route::controller(CheckoutController::class)->prefix('customer/checkout')->group(function () {
        Route::post('save-address', 'saveAddress')->name('shop.customer.checkout.save-address');

        Route::post('save-shipping', 'saveShipping')->name('shop.customer.checkout.save-shipping');
    
        Route::post('save-payment', 'savePayment')->name('shop.customer.checkout.save-payment');
    
        Route::post('check-minimum-order', 'checkMinimumOrder')->name('shop.customer.checkout.check-minimum-order');
    
        Route::post('save-order', 'saveOrder')->name('shop.customer.checkout.save-order');
    });
});
