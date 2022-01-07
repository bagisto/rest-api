<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\CartRule\Repositories\CartRuleRepository;

class CartRuleController extends MarketingController
{
    /**
     * Cart rule repository instance.
     *
     * @var \Webkul\CartRule\Repositories\CartRuleRepository
     */
    protected $cartRuleRepository;

    /**
     * Cart rule coupon repository instance.
     *
     * @var \Webkul\CartRule\Repositories\CartRuleCouponRepository
     */
    protected $cartRuleCouponRepository;

    /**
     * Create a new controller instance.
     *
     * @param \Webkul\CartRule\Repositories\CartRuleRepository       $cartRuleRepository
     * @param \Webkul\CartRule\Repositories\CartRuleCouponRepository $cartRuleCouponRepository
     *
     * @return void
     */
    public function __construct(
        CartRuleRepository $cartRuleRepository,
        CartRuleCouponRepository $cartRuleCouponRepository
    ) {
        $this->cartRuleRepository = $cartRuleRepository;

        $this->cartRuleCouponRepository = $cartRuleCouponRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartRules = $this->cartRuleRepository->all();

        return response([
            'data' => $cartRules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

        $cartRule = $this->cartRuleRepository->create($data);

        Event::dispatch('promotions.cart_rule.create.after', $cartRule);

        return response([
            'data'    => $cartRule,
            'message' => __('rest-api::app.response.success.create', ['name' => 'Cart Rule']),
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartRule = $this->cartRuleRepository->findOrFail($id);

        return response([
            'data' => $cartRule,
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

        $cartRule = $this->cartRuleRepository->findOrFail($id);

        if ($cartRule->coupon_type) {
            if ($cartRule->cart_rule_coupon) {
                $request->validate([
                    'coupon_code' => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code,' . $cartRule->cart_rule_coupon->id,
                ]);
            } else {
                $request->validate([
                    'coupon_code' => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code',
                ]);
            }
        }

        Event::dispatch('promotions.cart_rule.update.before', $cartRule);

        $cartRule = $this->cartRuleRepository->update($request->all(), $id);

        Event::dispatch('promotions.cart_rule.update.after', $cartRule);

        return response([
            'data'    => $cartRule,
            'message' => __('rest-api::app.response.success.update', ['name' => 'Cart Rule']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartRule = $this->cartRuleRepository->findOrFail($id);

        try {
            Event::dispatch('promotions.cart_rule.delete.before', $id);

            $this->cartRuleRepository->delete($id);

            Event::dispatch('promotions.cart_rule.delete.after', $id);

            return response([
                'message' => __('rest-api::app.response.success.delete', ['name' => 'Cart Rule']),
            ]);
        } catch (Exception $e) {}

        return response(['message' => __('admin::app.response.delete-failed', ['name' => 'Cart Rule'])], 400);
    }

    /**
     * Generate coupon code for cart rule
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

        if (! $id) {
            return response(['message' => __('admin::app.promotions.cart-rules.cart-rule-not-defind-error')], 400);
        }

        $this->cartRuleCouponRepository->generateCoupons($request->all(), $id);

        return response(['message' => __('rest-api::app.response.success.create', ['name' => 'Cart rule coupons'])]);
    }

    /**
     * Mass delete the coupons
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function massDestroy(Request $request)
    {
        $couponIds = explode(',', $request->input('indexes'));

        foreach ($couponIds as $couponId) {
            $coupon = $this->cartRuleCouponRepository->find($couponId);

            if ($coupon) {
                $this->cartRuleCouponRepository->delete($couponId);
            }
        }

        return response([
            'message' => __('admin::app.promotions.cart-rules.mass-delete-success'),
        ]);
    }
}
