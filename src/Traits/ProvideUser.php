<?php

namespace Webkul\RestApi\Traits;

use Illuminate\Http\Request;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

trait ProvideUser
{
    /**
     * Set default auth driver for admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function setAdminAuthDriver(Request $request)
    {
        if (EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            auth()->setDefaultDriver('admin');
        }
    }

    /**
     * Set default auth driver for shop.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function setShopAuthDriver(Request $request)
    {
        if (EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            auth()->setDefaultDriver('customer');
        }
    }

    /**
     * Resolve admin user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Webkul\User\Contracts\Admin
     */
    public function resolveAdminUser(Request $request)
    {
        if (EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            return auth('admin')->user();
        }

        return $request->user();
    }

    /**
     * Resolve shop user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Webkul\Customer\Contracts\Customer
     */
    public function resolveShopUser(Request $request)
    {
        if (EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            return auth('customer')->user();
        }

        return $request->user();
    }
}
