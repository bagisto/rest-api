<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\Promotions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\CartRule\Repositories\CartRuleRepository;
use Webkul\RestApi\Http\Controllers\V1\Admin\Marketing\MarketingController;
use Webkul\RestApi\Http\Resources\V1\Admin\Marketing\CartRuleResource;

class CartRuleController extends MarketingController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return CartRuleRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return CartRuleResource::class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                => 'required',
            'channels'            => 'required|array|min:1',
            'customer_groups'     => 'required|array|min:1',
            'coupon_type'         => 'required',
            'use_auto_generation' => 'required_if:coupon_type,==,1',
            'coupon_code'         => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code',
            'starts_from'         => 'nullable|date',
            'ends_till'           => 'nullable|date|after_or_equal:starts_from',
            'action_type'         => 'required',
            'discount_amount'     => 'required|numeric',
        ]);

        $data = $request->all();

        Event::dispatch('promotions.cart_rule.create.before');

        /**
         * These two keys needs to be removed in the next version compatibility.
         *
         * @deprecated
         */
        $data['starts_from'] = ! empty($data['starts_from']) ? $data['starts_from'] : null;
        $data['ends_till'] = ! empty($data['ends_till']) ? $data['ends_till'] : null;

        $cartRule = $this->getRepositoryInstance()->create($data);

        Event::dispatch('promotions.cart_rule.create.after', $cartRule);

        return response([
            'data'    => new CartRuleResource($cartRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rules.create-success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                => 'required',
            'channels'            => 'required|array|min:1',
            'customer_groups'     => 'required|array|min:1',
            'coupon_type'         => 'required',
            'use_auto_generation' => 'required_if:coupon_type,==,1',
            'starts_from'         => 'nullable|date',
            'ends_till'           => 'nullable|date|after_or_equal:starts_from',
            'action_type'         => 'required',
            'discount_amount'     => 'required|numeric',
        ]);

        $cartRule = $this->getRepositoryInstance()->findOrFail($id);

        if ($cartRule->coupon_type) {
            if ($cartRule->cart_rule_coupon) {
                $request->validate([
                    'coupon_code' => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code,'.$cartRule->cart_rule_coupon->id,
                ]);
            } else {
                $request->validate([
                    'coupon_code' => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code',
                ]);
            }
        }

        Event::dispatch('promotions.cart_rule.update.before', $id);

        $data = $request->all();

        /**
         * These two keys needs to be removed in the next version compatibility.
         *
         * @deprecated
         */
        $data['starts_from'] = ! empty($data['starts_from']) ? $data['starts_from'] : null;
        $data['ends_till'] = ! empty($data['ends_till']) ? $data['ends_till'] : null;

        $cartRule = $this->getRepositoryInstance()->update($data, $id);

        Event::dispatch('promotions.cart_rule.update.after', $cartRule);

        return response([
            'data'    => new CartRuleResource($cartRule),
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rules.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        Event::dispatch('promotions.cart_rule.delete.before', $id);

        $this->getRepositoryInstance()->delete($id);

        Event::dispatch('promotions.cart_rule.delete.after', $id);

        return response([
            'message' => trans('rest-api::app.admin.marketing.promotions.cart-rules.delete-success'),
        ]);
    }
}
