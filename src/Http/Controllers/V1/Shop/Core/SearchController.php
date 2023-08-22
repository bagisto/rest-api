<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Core;

use Webkul\Product\Repositories\SearchRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Core\SliderResource;

class SearchController extends CoreController
{
    protected $searchRepository;

    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return false;
    }

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function index()
    {
        $results = $this->searchRepository->search(request()->all());

        return response([
            'data' => ProductResource::collection($results),
        ]);
    }
}
