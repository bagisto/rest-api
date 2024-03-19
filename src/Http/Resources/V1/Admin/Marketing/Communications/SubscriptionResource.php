<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing\Communications;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'id'             => $this->id,
            'email'          => $this->email,
            'is_subscribed'  => $this->is_subscribed,
        ];
    }
}