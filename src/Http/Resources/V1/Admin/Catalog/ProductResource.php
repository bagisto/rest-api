<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\Product\ReviewResource;

class ProductResource extends JsonResource
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
            /**
             * Main attributes.
             */
            ...$this->resource->toArray(),

            'sku'        => $this->resource->sku,
            'reviews'    => $this->when($this->resource->reviews, ReviewResource::collection($this->resource->reviews)),

            /**
             * Additional attributes.
             */
            'images'     => ProductImageResource::collection($this->images),
            'videos'     => ProductVideoResource::collection($this->videos),
            'additional' => $this->additional,
        ];
    }
}
