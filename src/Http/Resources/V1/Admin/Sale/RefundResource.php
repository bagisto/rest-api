<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sale;

use Illuminate\Http\Resources\Json\JsonResource;

class RefundResource extends JsonResource
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
            'id'                     => $this->id,
            'increment_id'           => $this->increment_id,
            'state'                  => $this->state,
            'email_sent'             => $this->email_sent,
            'total_qty'              => $this->total_qty,
            'base_currency_code'     => $this->base_currency_code,
            'channel_currency_code'  => $this->channel_currency_code,
            'order_currency_code'    => $this->order_currency_code,
            'adjustment_refund'      => $this->adjustment_refund,
            'base_adjustment_refund' => $this->base_adjustment_refund,
            'adjustment_fee'         => $this->adjustment_fee,
            'base_adjustment_fee'    => $this->base_adjustment_fee,
            'sub_total'              => $this->sub_total,
            'base_sub_total'         => $this->base_sub_total,
            'grand_total'            => $this->grand_total,
            'base_grand_total'       => $this->base_grand_total,
            'shipping_amount'        => $this->shipping_amount,
            'base_shipping_amount'   => $this->base_shipping_amount,
            'tax_amount'             => $this->tax_amount,
            'base_tax_amount'        => $this->base_tax_amount,
            'discount_percent'       => $this->discount_percent,
            'discount_amount'        => $this->discount_amount,
            'base_discount_amount'   => $this->base_discount_amount,
            'order_id'               => $this->order_id,
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
