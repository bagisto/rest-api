<?php

namespace Webkul\RestApi\Http\Resources\V1\Shop\Checkout;

use Illuminate\Http\Resources\Json\JsonResource;

class CartPaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'method'       => $this->method,
            'method_title' => $this->method_title,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
