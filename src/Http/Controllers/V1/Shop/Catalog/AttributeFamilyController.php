<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\AttributeFamilyResource;

class AttributeFamilyController extends CatalogController
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
        return AttributeFamilyRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return AttributeFamilyResource::class;
    }
}
