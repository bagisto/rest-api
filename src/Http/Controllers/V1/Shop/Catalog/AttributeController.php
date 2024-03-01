<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\AttributeResource;

class AttributeController extends CatalogController
{
    /**
     * Is resource authorized.
     */
    public function isAuthorized(): bool
    {
        return false;
    }

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return AttributeRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return AttributeResource::class;
    }
}
