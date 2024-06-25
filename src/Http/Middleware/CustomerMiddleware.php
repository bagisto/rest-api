<?php

namespace Webkul\RestApi\Http\Middleware;

use Closure;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        /**
         * This is for session based authentication.
         */
        if (EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            if (! auth('customer')->user()) {
                return response([
                    'message' => trans('rest-api::app.customer.error.not-authorized'),
                ], 401);
            }

            return $next($request);
        }

        /**
         * This is for token based authentication.
         */
        if ($request->user()?->tokenCan('role:customer')) {
            return $next($request);
        }

        return response([
            'message' => trans('rest-api::app.customer.error.not-authorized'),
        ], 401);
    }
}
