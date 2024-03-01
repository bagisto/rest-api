<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Customer;

use Webkul\RestApi\Http\Resources\V1\Shop\Sales\ShipmentResource;
use Webkul\Sales\Repositories\ShipmentRepository;

class ShipmentController extends CustomerController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ShipmentRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ShipmentResource::class;
    }
}
