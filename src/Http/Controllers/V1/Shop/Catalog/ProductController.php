<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductResource;

use Illuminate\Support\Facades\Session;
use Webkul\Product\Repositories\ProductReviewRepository;

class ProductController extends CatalogController
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
        if ( Session::has('reviews_by_product') && Session::get('reviews_by_product') == true ) {
            return ProductReviewRepository::class;
        } else {
            return ProductRepository::class;
        }
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ProductResource::class;
    }

    /**
     * Get all reviews by the specific product.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $product_id)
    {
        $request->merge([ 'product_id' => $product_id ]);
        $request->merge([ 'reviews_by_product' => true ]);
        Session::put( 'reviews_by_product', true );

        $this->validate($request, [
            'product_id' => 'required|numeric',
        ]);

        return response([
            'message' => trans('rest-api::app.shop.catalog.products.reviews.get-success'),
            'data'    => parent::allResources( $request ),
        ]);
    }

    /**
     * Returns a listing of the resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function additionalInformation(Request $request, int $id)
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
     * @return \Illuminate\Http\Response
     */
    public function configurableConfig(Request $request, int $id)
    {
        $resource = $this->getRepositoryInstance()->findOrFail($id);

        $configurableConfig = app(\Webkul\Product\Helpers\ConfigurableOption::class)
            ->getConfigurationConfig($resource);

        return response([
            'data' => $configurableConfig,
        ]);
    }
}
