<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductResource;

class ProductController extends CatalogController
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
        return ProductRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ProductResource::class;
    }

    /**
     * Returns a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function allResources(Request $request)
    {
        $results = $this->getRepositoryInstance()->getAll($request->input('category_id'));

        return $this->getResourceCollection($results);
    }

    /**
     * Returns product's additional information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function additionalInformation(Request $request, $id)
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function configurableConfig(Request $request, $id)
    {
        $resource = $this->getRepositoryInstance()->findOrFail($id);

        $configurableConfig = app(\Webkul\Product\Helpers\ConfigurableOption::class)
            ->getConfigurationConfig($resource);

        return response([
            'data' => $configurableConfig,
        ]);
    }

    /**
     * Is product wishlisted.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function isWishlisted(Request $request, $productId)
    {
        $product = $this->getRepositoryInstance()->findOrFail($productId);

        $wishlistHelper = app(\Webkul\Customer\Helpers\Wishlist::class);

        return response([
            'data' => [
                'is_wishlisted' => $wishlistHelper->getWishlistProduct($product) ? true : false
            ],
        ]);
    }
}
