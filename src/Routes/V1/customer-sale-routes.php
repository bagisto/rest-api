<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerInvoiceController;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerOrderController;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerShipmentController;
use Webkul\RestApi\Http\Controllers\V1\Shop\CustomerTransactionController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('customer/orders', [CustomerOrderController::class, 'allResources']);

    Route::get('customer/orders/{id}', [CustomerOrderController::class, 'getResource']);

    Route::post('customer/orders/{id}/cancel', [CustomerOrderController::class, 'cancel']);

    Route::get('customer/invoices', [CustomerInvoiceController::class, 'allResources']);

    Route::get('customer/invoices/{id}', [CustomerInvoiceController::class, 'getResource']);

    Route::get('customer/shipments', [CustomerShipmentController::class, 'allResources']);

    Route::get('customer/shipments/{id}', [CustomerShipmentController::class, 'getResource']);

    Route::get('customer/transactions', [CustomerTransactionController::class, 'allResources']);

    Route::get('customer/transactions/{id}', [CustomerTransactionController::class, 'getResource']);
});
