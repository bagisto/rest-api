<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Core\Repositories\SliderRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\SliderResource;

class SliderController extends CoreController
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
        return SliderRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return SliderResource::class;
    }
}
