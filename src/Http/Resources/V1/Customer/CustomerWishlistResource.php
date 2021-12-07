<?php

namespace Webkul\RestApi\Http\Resources\V1\Customer;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Catalog\ProductResource;

class CustomerWishlistResource extends JsonResource
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
            'id'         => $this->id,
            'product'    => new ProductResource($this->product),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
