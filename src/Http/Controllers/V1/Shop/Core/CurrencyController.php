<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\CurrencyResource;

class CurrencyController extends CoreController
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
        return CurrencyRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CurrencyResource::class;
    }
}
