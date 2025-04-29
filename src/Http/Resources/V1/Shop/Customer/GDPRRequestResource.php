<?php

namespace Webkul\RestApi\Http\Resources\V1\Shop\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class GDPRRequestResource extends JsonResource
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
            'id'         => $this->id,
            'status'     => $this->status,
            'type'       => $this->type,
            'message'    => $this->message,
            'customer_id' => $this->customer_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
