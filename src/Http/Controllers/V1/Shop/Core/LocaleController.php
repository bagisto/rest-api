<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Core\Repositories\LocaleRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\LocaleResource;

class LocaleController extends CoreController
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
        return LocaleRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return LocaleResource::class;
    }
}
