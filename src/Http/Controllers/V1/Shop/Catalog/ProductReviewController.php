<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductReviewResource;

class ProductReviewController extends CatalogController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ProductReviewRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ProductReviewResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $productId)
    {
        $this->validate($request, [
            'comment' => 'required',
            'rating'  => 'required|numeric|min:1|max:5',
            'title'   => 'required',
        ]);

        $customer = $this->resolveShopUser($request);

        $productReview = $this->getRepositoryInstance()->create([
            'customer_id' => $customer->id,
            'name'        => $customer->name,
            'status'      => 'pending',
            'product_id'  => $productId,
            'comment'     => $request->comment,
            'rating'      => $request->rating,
            'title'       => $request->title,
        ]);

        return response([
            'data'    => new ProductReviewResource($productReview),
            'message' => 'Your review submitted successfully.',
        ]);
    }
}
