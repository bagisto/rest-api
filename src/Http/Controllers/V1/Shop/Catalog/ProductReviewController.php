<?php

namespace Webkul\RestApi\Http\Controllers\V1\Shop\Catalog;

use Illuminate\Http\Request;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\Product\Repositories\ProductReviewAttachmentRepository;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductReviewResource;

class ProductReviewController extends CatalogController
{
    /**
     * Create a controller instance.
     *
     * @return void
     */
    public function __construct(protected ProductReviewAttachmentRepository $productReviewAttachmentRepository) {}

    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return ProductReviewRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return ProductReviewResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $productId): \Illuminate\Http\Response
    {
        $this->validate($request, [
            'title'         => 'required',
            'comment'       => 'required',
            'rating'        => 'required|numeric|min:1|max:5',
            'attachments'   => 'array',
            'attachments.*' => 'file|mimetypes:image/*,video/*',
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

        $this->productReviewAttachmentRepository->upload(request()->file('attachments') ?? [], $productReview);

        return response([
            'data'    => new ProductReviewResource($productReview),
            'message' => trans('rest-api::app.shop.catalog.products.reviews.create-success'),
        ]);
    }
}
