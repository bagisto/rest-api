<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\RestApi\Http\Controllers\V1\Shop\ResourceController;
use Webkul\RestApi\Http\Resources\V1\Catalog\AttributeResource;

class AttributeController extends ResourceController
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return false;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return AttributeRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return AttributeResource::class;
    }
}
