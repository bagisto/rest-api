<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\CartRule\Repositories\CartRuleRepository;
use Webkul\Admin\Http\Requests\CartRuleRequest;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\Promotions\CartRuleResource;

class CartRuleController extends MarketingController
{
    /**
     * Repository class name.
     */
    public function repository(): string
    {
        return CartRuleRepository::class;
    }

    /**
     * Resource class name.
     */
    public function resource(): string
    {
        return CartRuleResource::class;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRuleRequest $cartRuleRequest): Response
    {
        Event::dispatch('promotions.cart_rule.create.before');

        $cartRule = $this->getRepositoryInstance()->create($cartRuleRequest->all());

        Event::dispatch('promotions.cart_rule.create.after', $cartRule);

        return response([
            'data'    => new CartRuleResource($cartRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rules.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartRuleRequest $cartRuleRequest, int $id): Response
    {
        $cartRule = $this->getRepositoryInstance()->findOrFail($id);

        if ($cartRule->coupon_type) {
            if ($cartRule->cart_rule_coupon) {
                $cartRuleRequest->validate([
                    'coupon_code' => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code,'.$cartRule->cart_rule_coupon->id,
                ]);
            } else {
                $cartRuleRequest->validate([
                    'coupon_code' => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code',
                ]);
            }
        }

        Event::dispatch('promotions.cart_rule.update.before', $id);

        $cartRule = $this->getRepositoryInstance()->update($cartRuleRequest->all(), $id);

        Event::dispatch('promotions.cart_rule.update.after', $cartRule);

        return response([
            'data'    => new CartRuleResource($cartRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rules.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $cartRule = $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('promotions.cart_rule.delete.before', $id);

        $cartRule->delete();

        Event::dispatch('promotions.cart_rule.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rules.delete-success'),
        ]);
    }
}
