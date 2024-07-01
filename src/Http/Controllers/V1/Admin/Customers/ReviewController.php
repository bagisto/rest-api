<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\ProductReviewResource;

class ReviewController extends BaseController
{
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
     * Update the specified resource in storage.
     */
    public function update(int $id): Response
    {
        $this->validate(request(), [
            'status' => 'required|in:approved,disapproved,pending',
        ]);
        
        Event::dispatch('customer.review.update.before', $id);

        $review = $this->getRepositoryInstance()->update(request()->only(['status']), $id);

        Event::dispatch('customer.review.update.after', $review);

        return response([
            'data'    => new ProductReviewResource($review),
            'message' => trans('rest-api::app.admin.customers.reviews.update-success'),
        ]);
    }

    /**
     * Delete the review.
     */
    public function destroy(int $id): Response
    {
        $review = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('customer.review.delete.before', $id);

        $review->delete();

        Event::dispatch('customer.review.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.customers.reviews.delete-success'),
        ]);
    }

    /**
     * Mass approve the reviews.
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): Response
    {
        $indices = $massUpdateRequest->input('indices');

        foreach ($indices as $id) {
            Event::dispatch('customer.review.update.before', $id);

            $review = $this->getRepositoryInstance()->update([
                'status' => $massUpdateRequest->input('value'),
            ], $id);

            Event::dispatch('customer.review.update.after', $review);
        }

        return response([
            'message' => trans('rest-api::app.admin.customers.reviews.mass-operations.update-success'),
        ]);
    }

    /**
     * Mass delete the reviews on the products.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): Response
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('customer.review.delete.before', $index);

            $this->getRepositoryInstance()->delete($index);

            Event::dispatch('customer.review.delete.after', $index);
        }

        return response([
            'message' => trans('rest-api::app.admin.customers.reviews.mass-operations.delete-success'),
        ]);
    }
}
