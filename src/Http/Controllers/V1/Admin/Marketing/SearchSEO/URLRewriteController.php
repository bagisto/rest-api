<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\SearchSEO;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\Admin\DataGrids\Marketing\SearchSEO\URLRewriteDataGrid;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Marketing\Repositories\URLRewriteRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\URLRewriteResource;

class URLRewriteController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return URLRewriteRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return URLRewriteResource::class;
    }
}