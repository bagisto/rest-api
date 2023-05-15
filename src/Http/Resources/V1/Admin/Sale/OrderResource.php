<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sale;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Setting\ChannelResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;

class OrderResource extends JsonResource
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
            'id'                                  => $this->id,
            'increment_id'                        => $this->increment_id,
            'status'                              => $this->status,
            'status_label'                        => $this->status_label,
            'channel_name'                        => $this->channel_name,
            'is_guest'                            => $this->is_guest,
            'customer_email'                      => $this->customer_email,
            'customer_first_name'                 => $this->customer_first_name,
            'customer_last_name'                  => $this->customer_last_name,
            'shipping_method'                     => $this->shipping_method,
            'shipping_title'                      => $this->shipping_title,
            'payment_title'                       => core()->getConfigData('sales.paymentmethods.' . $this->payment->method . '.title'),
            'shipping_description'                => $this->shipping_description,
            'coupon_code'                         => $this->coupon_code,
            'is_gift'                             => $this->is_gift,
            'total_item_count'                    => $this->total_item_count,
            'total_qty_ordered'                   => $this->total_qty_ordered,
            'base_currency_code'                  => $this->base_currency_code,
            'channel_currency_code'               => $this->channel_currency_code,
            'order_currency_code'                 => $this->order_currency_code,
            'grand_total'                         => $this->grand_total,
            'formatted_grand_total'               => core()->formatPrice($this->grand_total, $this->order_currency_code),
            'base_grand_total'                    => $this->base_grand_total,
            'formatted_base_grand_total'          => core()->formatBasePrice($this->base_grand_total),
            'grand_total_invoiced'                => $this->grand_total_invoiced,
            'formatted_grand_total_invoiced'      => core()->formatPrice($this->grand_total_invoiced, $this->order_currency_code),
            'base_grand_total_invoiced'           => $this->base_grand_total_invoiced,
            'formatted_base_grand_total_invoiced' => core()->formatBasePrice($this->base_grand_total_invoiced),
            'grand_total_refunded'                => $this->grand_total_refunded,
            'formatted_grand_total_refunded'      => core()->formatPrice($this->grand_total_refunded, $this->order_currency_code),
            'base_grand_total_refunded'           => $this->base_grand_total_refunded,
            'formatted_base_grand_total_refunded' => core()->formatBasePrice($this->base_grand_total_refunded),
            'sub_total'                           => $this->sub_total,
            'formatted_sub_total'                 => core()->formatPrice($this->sub_total, $this->order_currency_code),
            'base_sub_total'                      => $this->base_sub_total,
            'formatted_base_sub_total'            => core()->formatBasePrice($this->base_sub_total),
            'sub_total_invoiced'                  => $this->sub_total_invoiced,
            'formatted_sub_total_invoiced'        => core()->formatPrice($this->sub_total_invoiced, $this->order_currency_code),
            'base_sub_total_invoiced'             => $this->base_sub_total_invoiced,
            'formatted_base_sub_total_invoiced'   => core()->formatBasePrice($this->base_sub_total_invoiced),
            'sub_total_refunded'                  => $this->sub_total_refunded,
            'formatted_sub_total_refunded'        => core()->formatPrice($this->sub_total_refunded, $this->order_currency_code),
            'discount_percent'                    => $this->discount_percent,
            'discount_amount'                     => $this->discount_amount,
            'formatted_discount_amount'           => core()->formatPrice($this->discount_amount, $this->order_currency_code),
            'base_discount_amount'                => $this->base_discount_amount,
            'formatted_base_discount_amount'      => core()->formatBasePrice($this->base_discount_amount),
            'discount_invoiced'                   => $this->discount_invoiced,
            'formatted_discount_invoiced'         => core()->formatPrice($this->discount_invoiced, $this->order_currency_code),
            'base_discount_invoiced'              => $this->base_discount_invoiced,
            'formatted_base_discount_invoiced'    => core()->formatBasePrice($this->base_discount_invoiced),
            'discount_refunded'                   => $this->discount_refunded,
            'formatted_discount_refunded'         => core()->formatPrice($this->discount_refunded, $this->order_currency_code),
            'base_discount_refunded'              => $this->base_discount_refunded,
            'formatted_base_discount_refunded'    => core()->formatBasePrice($this->base_discount_refunded),
            'tax_amount'                          => $this->tax_amount,
            'formatted_tax_amount'                => core()->formatPrice($this->tax_amount, $this->order_currency_code),
            'base_tax_amount'                     => $this->base_tax_amount,
            'formatted_base_tax_amount'           => core()->formatBasePrice($this->base_tax_amount),
            'tax_amount_invoiced'                 => $this->tax_amount_invoiced,
            'formatted_tax_amount_invoiced'       => core()->formatPrice($this->tax_amount_invoiced, $this->order_currency_code),
            'base_tax_amount_invoiced'            => $this->base_tax_amount_invoiced,
            'formatted_base_tax_amount_invoiced'  => core()->formatBasePrice($this->base_tax_amount_invoiced),
            'tax_amount_refunded'                 => $this->tax_amount_refunded,
            'formatted_tax_amount_refunded'       => core()->formatPrice($this->tax_amount_refunded, $this->order_currency_code),
            'base_tax_amount_refunded'            => $this->base_tax_amount_refunded,
            'formatted_base_tax_amount_refunded'  => core()->formatBasePrice($this->base_tax_amount_refunded),
            'shipping_amount'                     => $this->shipping_amount,
            'formatted_shipping_amount'           => core()->formatPrice($this->shipping_amount, $this->order_currency_code),
            'base_shipping_amount'                => $this->base_shipping_amount,
            'formatted_base_shipping_amount'      => core()->formatBasePrice($this->base_shipping_amount),
            'shipping_invoiced'                   => $this->shipping_invoiced,
            'formatted_shipping_invoiced'         => core()->formatPrice($this->shipping_invoiced, $this->order_currency_code),
            'base_shipping_invoiced'              => $this->base_shipping_invoiced,
            'formatted_base_shipping_invoiced'    => core()->formatBasePrice($this->base_shipping_invoiced),
            'shipping_refunded'                   => $this->shipping_refunded,
            'formatted_shipping_refunded'         => core()->formatPrice($this->shipping_refunded, $this->order_currency_code),
            'base_shipping_refunded'              => $this->base_shipping_refunded,
            'formatted_base_shipping_refunded'    => core()->formatBasePrice($this->base_shipping_refunded),
            'customer'                            => $this->when($this->customer_id, new CustomerResource($this->customer)),
            'channel'                             => $this->when($this->channel_id, new ChannelResource($this->channel)),
            'shipping_address'                    => new OrderAddressResource($this->shipping_address),
            'billing_address'                     => new OrderAddressResource($this->billing_address),
            'items'                               => OrderItemResource::collection($this->items),
            'invoices'                            => InvoiceResource::collection($this->invoices),
            'shipments'                           => ShipmentResource::collection($this->shipments),
            'updated_at'                          => $this->updated_at,
            'created_at'                          => $this->created_at,
        ];
    }
}
