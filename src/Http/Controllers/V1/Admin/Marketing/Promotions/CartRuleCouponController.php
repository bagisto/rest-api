<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\Promotions\CartRuleCouponResource;

class CartRuleCouponController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CartRuleCouponRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CartRuleCouponResource::class;
    }

    /**
     * Get all cart rule coupons.
     */
    public function index(int $cartRuleId): Response
    {
        $coupons = $this->getRepositoryInstance()->where('cart_rule_id', $cartRuleId)->get();

        return response([
            'data' => $this->getResourceCollection($coupons),
        ]);
    }

    /**
     * Generate coupon code for cart rule.
     */
    public function store(Request $request, int $cartRuleId): Response
    {
        $request->validate([
            'coupon_qty'  => 'required|integer|min:1',
            'code_length' => 'required|integer|min:10',
            'code_format' => 'required',
        ]);

        if (! $cartRuleId) {
            return response([
                'message' => trans('rest-api::app.admin.marketing.promotions.cart-rule-coupons.not-defined-error'),
            ], 400);
        }

        $this->getRepositoryInstance()->generateCoupons($request->only(
            'coupon_qty',
            'code_length',
            'code_format',
            'code_prefix',
            'code_suffix'
        ), $cartRuleId);

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rule-coupons.create-success'),
        ]);
    }

    /**
     * Show specific cart rule coupon.
     */
    public function show(int $cartRuleId, int $id): Response
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
     * Delete specific cart rule coupon.
     */
    public function destroy(int $cartRuleId, int $id): Response
    {
        $cartRuleCoupon = $this->getRepositoryInstance()
            ->where('cart_rule_id', $cartRuleId)
            ->where('id', $id)
            ->firstOrFail();

            $cartRuleCoupon->delete();

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rule-coupons.delete-success'),
        ]);
    }

    /**
     * Mass delete the coupons.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest, int $cartRuleId): Response
    {
        foreach ($massDestroyRequest->indices as $couponId) {
            $cartRuleCoupon = $this->getRepositoryInstance()
                ->where('cart_rule_id', $cartRuleId)
                ->where('id', $couponId)
                ->firstOrFail();

            $cartRuleCoupon->delete();
        }

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rule-coupons.mass-operations.delete-success'),
        ]);
    }
}
