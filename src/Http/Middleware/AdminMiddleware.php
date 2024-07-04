<?php

namespace Webkul\RestApi\Http\Middleware;

use Closure;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AdminMiddleware
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
            if (! auth('admin')->user()) {
                return response([
                    'message' => __('rest-api::app.common-response.error.not-authorized'),
                ], 401);
            }

            return $next($request);
        }

        /**
         * This is for token based authentication.
         */
        if ($request->user()?->tokenCan('role:admin')) {
            try {
                return $next($request);
            } catch (\Exception $e) {
                dd($e);

                return response([
                    'message' => trans('rest-api::app.admin.error.record-not-found'),
                ], 401);
            }
        }

        return response([
            'message' => trans('rest-api::app.admin.error.not-authorized'),
        ], 401);
    }
}
