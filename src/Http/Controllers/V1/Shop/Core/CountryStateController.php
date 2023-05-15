<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Core\Repositories\CountryStateRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\CountryStateResource;

class CountryStateController extends CoreController
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
        return CountryStateRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CountryStateResource::class;
    }
}
