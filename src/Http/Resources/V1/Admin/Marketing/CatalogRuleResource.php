<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\ChannelResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerGroupResource;

class CatalogRuleResource extends JsonResource
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
            'id'              => $this->id,
            'name'            => $this->name,
            'description'     => $this->description,
            'starts_from'     => $this->starts_from,
            'ends_till'       => $this->ends_till,
            'status'          => $this->status,
            'channel'         => ChannelResource::collection($this->channels),
            'customer_group'  => CustomerGroupResource::collection($this->customer_groups),
            'condition_type'  => $this->condition_type,
            'conditions'      => $this->conditions,
            'end_other_rules' => $this->end_other_rules,
            'action_type'     => $this->action_type,
            'discount_amount' => $this->discount_amount,
            'sort_order'      => $this->sort_order,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
