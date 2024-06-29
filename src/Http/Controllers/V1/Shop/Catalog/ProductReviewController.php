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
    public function __construct(protected ProductReviewAttachmentRepository $productReviewAttachmentRepository) 
    {
    }

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
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $productId)
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

    /**
     * Get all reviews by the specific product.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductReview(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|numeric',
        ]);

        $query = $this->getRepositoryInstance()->scopeQuery(function ($query) use ($request) {
            foreach ($request->except($this->requestException) as $input => $value) {
                $query = $query->whereIn($input, array_map('trim', explode(',', $value)));
            }

            if ($sort = $request->input('sort')) {
                $query = $query->orderBy($sort, $request->input('order') ?? 'desc');
            } else {
                $query = $query->orderBy('id', $request->input('order') ?? 'desc');
            }

            return $query;
        });

        if (is_null($request->input('pagination')) || $request->input('pagination')) {
            $results = $query->paginate($request->input('limit') ?? 10);
        } else {
            $results = $query->get();
        }

        return response([
            'message' => trans('rest-api::app.shop.catalog.products.reviews.get-success'),
            'data'    => $this->getResourceCollection($results),
        ]);
    }
}
