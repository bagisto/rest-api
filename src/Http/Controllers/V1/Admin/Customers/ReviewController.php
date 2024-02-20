<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customers;

use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\ProductReviewResource;

class ReviewController extends BaseController
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Event::dispatch('customer.review.update.before', $id);

        $review = $this->getRepositoryInstance()->update(request()->only(['status']), $id);

        Event::dispatch('customer.review.update.after', $review);

        return response([
            'message' => trans('rest-api::app.admin.customers.reviews.update-success'),
        ]);
    }

    /**
     * Delete the review.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Event::dispatch('customer.review.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('customer.review.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.customers.reviews.delete-success'),
        ]);
    }

    /**
     * Mass approve the reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest)
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
     *
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest)
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
