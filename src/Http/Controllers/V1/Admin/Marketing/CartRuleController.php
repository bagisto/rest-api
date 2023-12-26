<?php

namespace Webkul\RestApi\Http\Controllers\V1\Admin\Marketing;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\CartRule\Repositories\CartRuleRepository;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name'                    => 'required',
                'channels'                => 'required|array|min:1',
                'customer_groups'         => 'required|array|min:1',
                'coupon_type'             => 'required',
                'use_auto_generation'     => 'required_if:coupon_type,==,1',
                'coupon_code'             => 'required_if:use_auto_generation,==,0|unique:cart_rule_coupons,code',
                'starts_from'             => 'nullable|date',
                'ends_till'               => 'nullable|date|after_or_equal:starts_from',
                'action_type'             => 'required',
                'discount_amount'         => 'required|numeric',
            ]);

            $data = $request->all();           
    
            if(array_key_exists('starts_from', $data) 
               || array_key_exists('ends_till', $data)
            ){
                $data['starts_from'] = $data['starts_from'];

                $data['ends_till'] =  $data['ends_till'];
            } else {
                $data['starts_from'] = null;

                $data['ends_till'] = null;
            }
             
            $cartRule = $this->getRepositoryInstance()->create($data);

            return response([
                'data'    => new CartRuleResource($cartRule),
                'message' => __('rest-api::app.common-response.success.create', ['name' => 'Cart rule']),
            ]);
        } catch(ValidationException $e){
            return response([
                'errors' => $e->validator->errors()->toArray(),
            ]);
        }
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

        $cartRule = $this->getRepositoryInstance()->findOrFail($id);

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

        $cartRule = $this->getRepositoryInstance()->update($request->all(), $id);

        return response([
            'data'    => new CartRuleResource($cartRule),
            'message' => __('rest-api::app.common-response.success.update', ['name' => 'Cart rule']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getRepositoryInstance()->findOrFail($id);

        $this->getRepositoryInstance()->delete($id);

        return response([
            'message' => __('rest-api::app.common-response.success.delete', ['name' => 'Cart rule']),
        ]);
    }
}
