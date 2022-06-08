<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin;

class AdminController extends ResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * This is for session based authentication. Activated to
         * all the controllers which are inherit from this.
         */
        if (! request()->has('accept_token')) {
            auth()->setDefaultDriver('admin');
        }
    }
}
