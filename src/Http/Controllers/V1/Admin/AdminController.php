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
        $this->setAdminAuthDriver(request());
    }
}
