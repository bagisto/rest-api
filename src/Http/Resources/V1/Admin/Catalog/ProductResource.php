<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;

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
        /**
         * Not able to use individual key in the resource because
         * attributes are system defined and custom defined.
         *
         * @var array
         */
        $mainAttributes = $this->resource->toArray();

        return [
            /**
             * Main attributes.
             */
            $this->merge($mainAttributes),

            /**
             * Additional attributes.
             */
            'images'     => ProductImageResource::collection($this->images),
            'videos'     => ProductVideoResource::collection($this->videos),
            'additional' => $this->additional,
        ];
    }
}
