<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing;

use Illuminate\Http\Resources\Json\JsonResource;

class CartRuleCouponResource extends JsonResource
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
            'id'                 => $this->id,
            'code'               => $this->code,
            'usage_limit'        => $this->usage_limit,
            'usage_per_customer' => $this->usage_per_customer,
            'times_used'         => $this->times_used,
            'type'               => $this->type,
            'is_primary'         => $this->is_primary,
            'expired_at'         => $this->expired_at,
            'cart_rule_id'       => $this->cart_rule_id,
            'created_at'         => $this->created_at,
            'updated_at'         => $this->updated_at,
        ];
    }
}
