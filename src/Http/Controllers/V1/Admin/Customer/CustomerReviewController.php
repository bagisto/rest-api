<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\Product\Repositories\ProductReviewRepository;

class CustomerReviewController extends CustomerBaseController
{
    /**
     * ProductReviewRepository instance.
     *
     * @var \Webkul\Product\Repositories\ProductReviewRepository
     */
    protected $productReviewRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Product\Repositories\ProductReviewRepository  $productReview
     * @return void
     */
    public function __construct(ProductReviewRepository $productReviewRepository)
    {
        $this->productReviewRepository = $productReviewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = $this->productReviewRepository->all();

        return response([
            'data' => $reviews,
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = $this->productReviewRepository->findOrFail($id);

        return response([
            'data' => $review,
        ]);
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
        Event::dispatch('customer.review.update.before', $id);

        $this->productReviewRepository->update($request->all(), $id);

        Event::dispatch('customer.review.update.after', $id);

        return response([
            'message' => trans('admin::app.response.update-success', ['name' => 'Review']),
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
        $this->productReviewRepository->findOrFail($id);

        try {
            Event::dispatch('customer.review.delete.before', $id);

            $this->productReviewRepository->delete($id);

            Event::dispatch('customer.review.delete.after', $id);

            return response([
                'message' => trans('admin::app.response.delete-success', ['name' => 'Review']),
            ], 200);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.response.delete-failed', ['name' => 'Review']),
        ], 400);
    }

    /**
     * Mass delete the reviews.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $indexes = explode(',', $request->input('indexes'));

        try {
            foreach ($indexes as $index) {
                Event::dispatch('customer.review.delete.before', $index);

                $this->productReviewRepository->delete($index);

                Event::dispatch('customer.review.delete.after', $index);
            }

            return response([
                'message' => trans('admin::app.datagrid.mass-ops.delete-success', ['resource' => 'Reviews']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.datagrid.mass-ops.partial-action', ['resource' => 'Reviews']),
        ]);
    }

    /**
     * Mass approve the reviews.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function massUpdate(Request $request)
    {
        $data = $request->all();

        $indexes = explode(',', $request->input('indexes'));

        try {
            foreach ($indexes as $index) {
                $review = $this->productReviewRepository->findOneByField('id', $index);

                if ($data['massaction-type'] == 'update') {
                    if ($data['update-options'] == 1) {
                        Event::dispatch('customer.review.update.before', $index);

                        $review->update(['status' => 'approved']);

                        Event::dispatch('customer.review.update.after', $review);
                    } elseif ($data['update-options'] == 0) {
                        $review->update(['status' => 'pending']);
                    } elseif ($data['update-options'] == 2) {
                        $review->update(['status' => 'disapproved']);
                    } else {
                        continue;
                    }
                }
            }

            return response([
                'message' => trans('admin::app.datagrid.mass-ops.update-success', ['resource' => 'Reviews']),
            ]);
        } catch (\Exception $e) {}

        return response([
            'message' => trans('admin::app.datagrid.mass-ops.partial-action', ['resource' => 'Reviews']),
        ]);
    }
}
