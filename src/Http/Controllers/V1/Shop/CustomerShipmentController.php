<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop;

use Webkul\RestApi\Http\Resources\V1\Sales\ShipmentResource;
use Webkul\Sales\Repositories\ShipmentRepository;

class CustomerShipmentController extends ResourceController
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
