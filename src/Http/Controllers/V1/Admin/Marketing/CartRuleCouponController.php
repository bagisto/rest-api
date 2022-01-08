<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Http\Request;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Core\Http\Requests\MassDestroyRequest;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\CartRuleCouponResource;

class CartRuleCouponController extends MarketingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CartRuleCouponRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CartRuleCouponResource::class;
    }

    /**
     * Generate coupon code for cart rule.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateCoupons(Request $request, $id)
    {
        $request->validate([
            'coupon_qty'  => 'required|integer|min:1',
            'code_length' => 'required|integer|min:10',
            'code_format' => 'required',
        ]);

        $this->getRepositoryInstance()->generateCoupons($request->all(), $id);

        return response([
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Cart rule coupons']),
        ]);
    }

    /**
     * Mass delete the coupons.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request)
    {
        foreach ($request->indexes as $couponId) {
            $this->getRepositoryInstance()->findOrFail($couponId);

            $this->getRepositoryInstance()->delete($couponId);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'cart rule coupons']),
        ]);
    }
}
