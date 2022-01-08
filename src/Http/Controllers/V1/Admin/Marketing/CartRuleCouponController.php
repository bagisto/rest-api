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
     * Get all cart rule coupons.
     *
     * @param  int  $cartRuleId
     * @return \Illuminate\Http\Response
     */
    public function index(int $cartRuleId)
    {
        $coupons = $this->getRepositoryInstance()->where('cart_rule_id', $cartRuleId)->get();

        return response([
            'data' => $this->getResourceCollection($coupons),
        ]);
    }

    /**
     * Generate coupon code for cart rule.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cartRuleId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cartRuleId)
    {
        $request->validate([
            'coupon_qty'  => 'required|integer|min:1',
            'code_length' => 'required|integer|min:10',
            'code_format' => 'required',
        ]);

        $this->getRepositoryInstance()->generateCoupons($request->all(), $cartRuleId);

        return response([
            'message' => __('rest-api::app.common-response.success.create', ['name' => 'Cart rule coupons']),
        ]);
    }

    /**
     * Show specific cart rule coupon.
     *
     * @param  int  $cartRuleId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $cartRuleId, int $id)
    {
        $coupon = $this->getRepositoryInstance()
            ->where('cart_rule_id', $cartRuleId)
            ->where('id', $id)
            ->firstOrFail();

        return response([
            'data' => new CartRuleCouponResource($coupon),
        ]);
    }

    /**
     * Show specific cart rule coupon.
     *
     * @param  int  $cartRuleId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $cartRuleId, int $id)
    {
        $this->getRepositoryInstance()
            ->where('cart_rule_id', $cartRuleId)
            ->where('id', $id)
            ->firstOrFail();

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Cart rule coupon']),
        ]);
    }

    /**
     * Mass delete the coupons.
     *
     * @param  \Webkul\Core\Http\Requests\MassDestroyRequest  $request
     * @param  int  $cartRuleId
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRequest $request, int $cartRuleId)
    {
        foreach ($request->indexes as $couponId) {
            $this->getRepositoryInstance()
                ->where('cart_rule_id', $cartRuleId)
                ->where('id', $couponId)
                ->firstOrFail();

            $this->getRepositoryInstance()->delete($couponId);
        }

        return response([
            'message' => __('rest-api::app.common-response.success.mass-operations.delete', ['name' => 'cart rule coupons']),
        ]);
    }
}
