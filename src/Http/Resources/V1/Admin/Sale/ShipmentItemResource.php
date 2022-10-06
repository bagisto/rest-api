<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sale;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentItemResource extends JsonResource
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
            'id'                   => $this->id,
            'name'                 => $this->name,
            'description'          => $this->description,
            'sku'                  => $this->sku,
            'qty'                  => $this->qty,
            'weight'               => $this->weight,
            'price'                => $this->price,
            'formatted_price'      => core()->formatPrice($this->price, $this->shipment->order->order_currency_code),
            'base_price'           => $this->base_price,
            'formatted_base_price' => core()->formatBasePrice($this->base_price),
            'total'                => $this->total,
            'formatted_total'      => core()->formatPrice($this->total, $this->shipment->order->order_currency_code),
            'base_total'           => $this->base_total,
            'formatted_base_total' => core()->formatBasePrice($this->base_total),
            'additional'           => is_array($this->resource->additional)
                ? $this->resource->additional
                : json_decode($this->resource->additional, true),
        ];
    }
}
