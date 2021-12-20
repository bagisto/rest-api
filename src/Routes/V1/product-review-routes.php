<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Shop\ProductReviewController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('products/{product_id}/reviews', [ProductReviewController::class, 'store']);
});
