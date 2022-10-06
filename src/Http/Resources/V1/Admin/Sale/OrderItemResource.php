<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sale;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'id'                                 => $this->id,
            'sku'                                => $this->sku,
            'type'                               => $this->type,
            'name'                               => $this->name,
            'product_id'                         => $this->product_id,
            'coupon_code'                        => $this->coupon_code,
            'weight'                             => $this->weight,
            'total_weight'                       => $this->total_weight,
            'qty_ordered'                        => $this->qty_ordered,
            'qty_canceled'                       => $this->qty_canceled,
            'qty_invoiced'                       => $this->qty_invoiced,
            'qty_shipped'                        => $this->qty_shipped,
            'qty_refunded'                       => $this->qty_refunded,
            'price'                              => $this->price,
            'formatted_price'                    => core()->formatPrice($this->price, $this->order->order_currency_code),
            'base_price'                         => $this->base_price,
            'formatted_base_price'               => core()->formatBasePrice($this->base_price),
            'total'                              => $this->total,
            'formatted_total'                    => core()->formatPrice($this->total, $this->order->order_currency_code),
            'base_total'                         => $this->base_total,
            'formatted_base_total'               => core()->formatBasePrice($this->base_total),
            'total_invoiced'                     => $this->total_invoiced,
            'formatted_total_invoiced'           => core()->formatPrice($this->total_invoiced, $this->order->order_currency_code),
            'base_total_invoiced'                => $this->base_total_invoiced,
            'formatted_base_total_invoiced'      => core()->formatBasePrice($this->base_total_invoiced),
            'amount_refunded'                    => $this->amount_refunded,
            'formatted_amount_refunded'          => core()->formatPrice($this->amount_refunded, $this->order->order_currency_code),
            'base_amount_refunded'               => $this->base_amount_refunded,
            'formatted_base_amount_refunded'     => core()->formatBasePrice($this->base_amount_refunded),
            'discount_percent'                   => $this->discount_percent,
            'discount_amount'                    => $this->discount_amount,
            'formatted_discount_amount'          => core()->formatPrice($this->discount_amount, $this->order->order_currency_code),
            'base_discount_amount'               => $this->base_discount_amount,
            'formatted_base_discount_amount'     => core()->formatBasePrice($this->base_discount_amount),
            'discount_invoiced'                  => $this->discount_invoiced,
            'formatted_discount_invoiced'        => core()->formatPrice($this->discount_invoiced, $this->order->order_currency_code),
            'base_discount_invoiced'             => $this->base_discount_invoiced,
            'formatted_base_discount_invoiced'   => core()->formatBasePrice($this->base_discount_invoiced),
            'discount_refunded'                  => $this->discount_refunded,
            'formatted_discount_refunded'        => core()->formatPrice($this->discount_refunded, $this->order->order_currency_code),
            'base_discount_refunded'             => $this->base_discount_refunded,
            'formatted_base_discount_refunded'   => core()->formatBasePrice($this->base_discount_refunded),
            'tax_percent'                        => $this->tax_percent,
            'tax_amount'                         => $this->tax_amount,
            'formatted_tax_amount'               => core()->formatPrice($this->tax_amount, $this->order->order_currency_code),
            'base_tax_amount'                    => $this->base_tax_amount,
            'formatted_base_tax_amount'          => core()->formatBasePrice($this->base_tax_amount),
            'tax_amount_invoiced'                => $this->tax_amount_invoiced,
            'formatted_tax_amount_invoiced'      => core()->formatPrice($this->tax_amount_invoiced, $this->order->order_currency_code),
            'base_tax_amount_invoiced'           => $this->base_tax_amount_invoiced,
            'formatted_base_tax_amount_invoiced' => core()->formatBasePrice($this->base_tax_amount_invoiced),
            'tax_amount_refunded'                => $this->tax_amount_refunded,
            'formatted_tax_amount_refunded'      => core()->formatPrice($this->tax_amount_refunded, $this->order->order_currency_code),
            'base_tax_amount_refunded'           => $this->base_tax_amount_refunded,
            'formatted_base_tax_amount_refunded' => core()->formatBasePrice($this->base_tax_amount_refunded),
            'grant_total'                        => $this->total + $this->tax_amount,
            'formatted_grant_total'              => core()->formatPrice($this->total + $this->tax_amount, $this->order->order_currency_code),
            'base_grant_total'                   => $this->base_total + $this->base_tax_amount,
            'formatted_base_grant_total'         => core()->formatPrice($this->base_total + $this->base_tax_amount, $this->order->order_currency_code),
            'downloadable_links'                 => $this->downloadable_link_purchased,
            'additional'                         => is_array($this->resource->additional)
                ? $this->resource->additional
                : json_decode($this->resource->additional, true),
            'child'                              => new self($this->child),
            'children'                           => Self::collection($this->children),
        ];
    }
}
