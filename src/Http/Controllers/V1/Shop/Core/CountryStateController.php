<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Core\Repositories\CountryStateRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\CountryStateResource;

class CountryStateController extends CoreController
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
        return CountryStateRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CountryStateResource::class;
    }
}
