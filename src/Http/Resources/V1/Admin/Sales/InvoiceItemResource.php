<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sales;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
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
            'id'                         => $this->id,
            'name'                       => $this->name,
            'description'                => $this->description,
            'sku'                        => $this->sku,
            'qty'                        => $this->qty,
            'price'                      => $this->price,
            'formatted_price'            => core()->formatPrice($this->price, $this->invoice->order_currency_code),
            'price_incl_tax'             => $this->price_incl_tax,
            "formatted_price_incl_tax"   => core()->formatPrice($this->price_incl_tax, $this->invoice->order_currency_code),
            'base_price'                 => $this->base_price,
            'formatted_base_price'       => core()->formatBasePrice($this->base_price),
            'base_price_incl_tax'        => $this->base_price_incl_tax,
            'formatted_base_price_incl_tax' => core()->formatBasePrice($this->base_price_incl_tax),
            'total'                      => $this->total,
            'formatted_total'            => core()->formatPrice($this->total, $this->invoice->order_currency_code),
            'total_incl_tax'             => $this->total_incl_tax,
            'formatted_total_incl_tax'   => core()->formatPrice($this->total_incl_tax, $this->invoice->order_currency_code),
            'base_total'                 => $this->base_total,
            'formatted_base_total'       => core()->formatBasePrice($this->base_total),
            'base_total_incl_tax'        => $this->base_total_incl_tax,
            'formatted_base_total_incl_tax' => core()->formatBasePrice($this->base_total_incl_tax, $this->invoice->order_currency_code),
            'tax_amount'                 => $this->tax_amount,
            'formatted_tax_amount'       => core()->formatPrice($this->tax_amount, $this->invoice->order_currency_code),
            'base_tax_amount'            => $this->base_tax_amount,
            'formatted_base_tax_amount'  => core()->formatBasePrice($this->base_tax_amount),
            'grand_total'                => $this->total + $this->tax_amount,
            'formatted_grand_total'      => core()->formatPrice($this->total + $this->tax_amount, $this->invoice->order_currency_code),
            'base_grand_total'           => $this->base_total + $this->base_tax_amount,
            'formatted_base_grand_total' => core()->formatBasePrice($this->base_total + $this->base_tax_amount),
            'additional'                 => is_array($this->resource->additional)
                ? $this->resource->additional
                : json_decode($this->resource->additional, true),
            'child'                      => new self($this->child),
            'children'                   => self::collection($this->children),
        ];
    }
}
