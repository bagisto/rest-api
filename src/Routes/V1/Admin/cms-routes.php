<?php

use Illuminate\Support\Facades\Route;
use Webkul\RestApi\Http\Controllers\V1\Admin\CMS\PageController;

Route::group(['middleware' => ['auth:sanctum', 'sanctum.admin']], function () {
    /**
     * CMS page routes.
     */
    Route::controller(PageController::class)->prefix('cms')->group(function () {
        Route::get('', 'allResources');

        Route::post('', 'store');

        Route::get('{id}', 'getResource');

        Route::put('{id}', 'update');

        Route::delete('{id}', 'destroy');

        Route::post('mass-destroy', 'massDestroy');
    });
});
