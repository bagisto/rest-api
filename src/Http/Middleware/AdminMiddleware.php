<?php

namespace Webkul\RestApi\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /**
         * Admin model.
         *
         * @var \Webkul\User\Models\Admin
         */
        $admin = auth()->user();

        if ($admin && $admin->tokenCan('role:admin')) {
            return $next($request);
        }

        return response([
            'message' => __('rest-api::app.common-response.error.not-authorized'),
        ], 401);
    }
}
