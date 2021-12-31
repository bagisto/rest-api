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
        return [
            'id'                   => $this->id,
            'sku'                  => $this->sku,
            'type'                 => $this->type,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
            'parent_id'            => $this->parent_id,
            'attribute_family_id'  => $this->attribute_family_id,
            'additional'           => $this->additional,
            'short_description'    => $this->short_description,
            'description'          => $this->description,
            'name'                 => $this->name,
            'url_key'              => $this->url_key,
            'tax_category_id'      => $this->tax_category_id,
            'new'                  => $this->new,
            'featured'             => $this->featured,
            'visible_individually' => $this->visible_individually,
            'status'               => $this->status,
            'color'                => $this->color,
            'size'                 => $this->size,
            'brand'                => $this->brand,
            'guest_checkout'       => $this->guest_checkout,
            'product_number'       => $this->product_number,
            'meta_title'           => $this->meta_title,
            'meta_keywords'        => $this->meta_keywords,
            'meta_description'     => $this->meta_description,
            'price'                => $this->price,
            'cost'                 => $this->cost,
            'special_price'        => $this->special_price,
            'special_price_from'   => $this->special_price_from,
            'special_price_to'     => $this->special_price_to,
            'length'               => $this->length,
            'width'                => $this->width,
            'height'               => $this->height,
            'weight'               => $this->weight,
        ];
    }
}
