<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Sale;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Inventory\InventorySourceResource;

class ShipmentResource extends JsonResource
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
            'id'               => $this->id,
            'status'           => $this->status,
            'total_qty'        => $this->total_qty,
            'total_weight'     => $this->total_weight,
            'carrier_code'     => $this->carrier_code,
            'carrier_title'    => $this->carrier_title,
            'track_number'     => $this->track_number,
            'email_sent'       => $this->email_sent,
            'customer'         => $this->when($this->customer_id, new CustomerResource($this->customer)),
            'inventory_source' => $this->when($this->inventory_source_id, new InventorySourceResource($this->inventory_source)),
            'items'            => ShipmentItemResource::collection($this->items),
        ];
    }
}
