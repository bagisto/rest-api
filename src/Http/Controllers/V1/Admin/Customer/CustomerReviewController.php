<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Core\Http\Requests\MassUpdateRequest;
use Webkul\Product\Repositories\ProductReviewRepository;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\ProductReviewResource;

class CustomerReviewController extends CustomerBaseController
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Review']),
        ]);
    }

    /**
     * Delete the review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Review']),
        ]);
    }

    /**
     * Mass approve the reviews.
     *
     * @param  \Webkul\Core\Http\Requests\MassUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(MassUpdateRequest $request)
    {
        foreach ($request->indexes as $index) {
            $review = $this->getRepositoryInstance()->findOrFail($index);

            Event::dispatch('customer.review.update.before', $index);

            if ($request->update_value == 0) {
                $review->update(['status' => 'pending']);
            }

            if ($request->update_value == 1) {
                $review->update(['status' => 'approved']);
            }

            if ($request->update_value == 2) {
                $review->update(['status' => 'disapproved']);
            }

            Event::dispatch('customer.review.update.after', $review);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.update', ['name' => 'reviews']),
        ]);
    }
}
