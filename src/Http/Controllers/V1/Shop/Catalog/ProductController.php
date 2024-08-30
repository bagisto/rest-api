<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductResource;

class ProductController extends CatalogController
{
        /**
     * Create a controller instance.
     *
     * @return void
     */
    public function __construct(protected ProductRepository $productRepository) {}

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
        return ProductRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ProductResource::class;
    }

    /**
     * Returns a listing of the resource.
     */
    public function allResources(Request $request)
    {
        if (core()->getConfigData('catalog.products.search.engine') == 'elastic') {
            $searchEngine = core()->getConfigData('catalog.products.search.storefront_mode');
        }

        $products = $this->getRepositoryInstance()
            ->setSearchEngine($searchEngine ?? 'database')
            ->getAll(array_merge(request()->query(), [
                'channel_id'           => core()->getCurrentChannel()->id,
                'status'               => 1,
                'visible_individually' => 1,
            ]));

        return $this->getResourceCollection($products);
    }

    /**
     * Returns product's additional information.
     */
    public function additionalInformation(Request $request, int $id): Response
    {
        $resource = $this->getRepositoryInstance()->findOrFail($id);

        $additionalInformation = app(\Webkul\Product\Helpers\View::class)
            ->getAdditionalData($resource);

        return response([
            'data' => $additionalInformation,
        ]);
    }

    /**
     * Returns product's additional information.
     */
    public function configurableConfig(Request $request, int $id): Response
    {
        $resource = $this->getRepositoryInstance()->findOrFail($id);

        $configurableConfig = app(\Webkul\Product\Helpers\ConfigurableOption::class)
            ->getConfigurationConfig($resource);

        return response([
            'data' => $configurableConfig,
        ]);
    }
}
