<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Catalog\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerResource;

class ReviewResource extends JsonResource
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
            'title'      => $this->title,
            'rating'     => $this->rating,
            'comment'    => $this->comment,
            'name'       => $this->name,
            'status'     => $this->status,
            'images'     => $this->images,
            'customer'   => $this->when($this->customer_id, new CustomerResource($this->customer)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
