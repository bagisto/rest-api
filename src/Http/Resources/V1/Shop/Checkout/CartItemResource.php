<?php

namespace Webkul\RestApi\Http\Resources\V1\Shop\Checkout;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Shop\Catalog\ProductResource;

class CartItemResource extends JsonResource
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
            'quantity'        => $this->quantity,
            'type'            => $this->type,
            'name'            => $this->name,
            'price'           => $this->price,
            'formatted_price' => core()->formatPrice($this->price),
            'total'           => $this->total,
            'formatted_total' => core()->formatPrice($this->total),
            'options'         => array_values($this->resource->additional['attributes'] ?? []),
            'product_url_key' => $this->product->url_key,
        ];
    }      
}
