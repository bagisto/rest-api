<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing;

use Illuminate\Http\Resources\Json\JsonResource;

class CartRuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'name'                      => $this->name,
            'description'               => $this->description,
            'starts_from'               => $this->starts_from,
            'ends_till'                 => $this->ends_till,
            'status'                    => $this->status,
            'coupon_type'               => $this->coupon_type,
            'use_auto_generation'       => $this->use_auto_generation,
            'usage_per_customer'        => $this->usage_per_customer,
            'uses_per_coupon'           => $this->uses_per_coupon,
            'times_used'                => $this->times_used,
            'condition_type'            => $this->condition_type,
            'conditions'                => $this->conditions,
            'end_other_rules'           => $this->end_other_rules,
            'uses_attribute_conditions' => $this->uses_attribute_conditions,
            'action_type'               => $this->action_type,
            'discount_amount'           => $this->discount_amount,
            'discount_quantity'         => $this->discount_quantity,
            'discount_step'             => $this->discount_step,
            'apply_to_shipping'         => $this->apply_to_shipping,
            'free_shipping'             => $this->free_shipping,
            'sort_order'                => $this->sort_order,
            'created_at'                => $this->created_at,
            'updated_at'                => $this->updated_at,
        ];
    }
}
