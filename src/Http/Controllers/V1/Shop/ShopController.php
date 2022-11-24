<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

class ShopController extends ResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setShopAuthDriver(request());
    }
}
