<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sale;

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
            'description'                => $this->description,
            'qty'                        => $this->qty,
            'price'                      => $this->price,
            'formatted_price'            => core()->formatPrice($this->price, $this->invoice->order_currency_code),
            'base_price'                 => $this->base_price,
            'formatted_base_price'       => core()->formatBasePrice($this->base_price),
            'total'                      => $this->total,
            'formatted_total'            => core()->formatPrice($this->total, $this->invoice->order_currency_code),
            'base_total'                 => $this->base_total,
            'formatted_base_total'       => core()->formatBasePrice($this->base_total),
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
            'children'                   => Self::collection($this->children),
        ];
    }
}
