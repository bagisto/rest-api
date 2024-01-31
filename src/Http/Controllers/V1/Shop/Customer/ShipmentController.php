<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Webkul\RestApi\Http\Resources\V1\Shop\Sales\ShipmentResource;
use Webkul\Sales\Repositories\ShipmentRepository;

class ShipmentController extends CustomerController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ShipmentRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ShipmentResource::class;
    }
}
