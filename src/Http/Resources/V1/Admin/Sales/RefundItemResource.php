<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sales;

use Illuminate\Http\Resources\Json\JsonResource;

class RefundItemResource extends JsonResource
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
            'id'                              => $this->id,
            'name'                            => $this->name,
            'description'                     => $this->description,
            'sku'                             => $this->sku,
            'description'                     => $this->description,
            'qty'                             => $this->qty,
            'price'                           => $this->price,
            'formatted_price'                 => core()->formatPrice($this->price, $this->refund->order_currency_code),
            'base_price'                      => $this->base_price,
            'formatted_base_price'            => core()->formatBasePrice($this->base_price),
            'total'                           => $this->total,
            'formatted_total'                 => core()->formatPrice($this->total, $this->refund->order_currency_code),
            'base_total'                      => $this->base_total,
            'formatted_base_total'            => core()->formatBasePrice($this->base_total),
            'tax_amount'                      => $this->tax_amount,
            'formatted_tax_amount'            => core()->formatPrice($this->tax_amount, $this->refund->order_currency_code),
            'base_tax_amount'                 => $this->base_tax_amount,
            'formatted_base_tax_amount'       => core()->formatBasePrice($this->base_tax_amount),
            'discount_percent'                => $this->discount_percent,
            'discount_amount'                 => $this->discount_amount,
            'formatted_discount_amount'       => core()->formatPrice($this->discount_amount, $this->refund->order_currency_code),
            'base_discount_amount'            => $this->base_discount_amount,
            'formatted_base_discount_amount'  => core()->formatBasePrice($this->base_discount_amount),
            'grand_total'                     => $this->total + $this->discount_amount,
            'formatted_grand_total'           => core()->formatPrice($this->total + $this->discount_amount, $this->refund->order_currency_code),
            'base_grand_total'                => $this->base_total + $this->base_discount_amount,
            'formatted_base_grand_total'      => core()->formatBasePrice($this->base_total + $this->base_discount_amount),
            'additional'                      => is_array($this->resource->additional)
                ? $this->resource->additional
                : json_decode($this->resource->additional, true),
            'child'                      => new self($this->child),
            'children'                   => $this->children ? self::collection($this->children) : [],
        ];
    }
}
