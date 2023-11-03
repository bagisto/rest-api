<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parent_category_name = null;
        if ($this->parent) {
            $parent_category_name = $this->parent->translations->first() ? $this->translations->first()->name : 'Category';
        }

        return [
            'id'                 => $this->id,
            'parent_id'          => $this->parent_id,
            'parent_category_name' => $parent_category_name,
            'name'               => $this->name,
            'slug'               => $this->slug,
            'display_mode'       => $this->display_mode,
            'description'        => $this->description,
            'meta_title'         => $this->meta_title,
            'meta_description'   => $this->meta_description,
            'meta_keywords'      => $this->meta_keywords,
            'status'             => $this->status,
            'image_url'          => $this->image_url ?? asset("vendor/webkul/ui/assets/images/product/small-product-placeholder.png"),
            'category_icon_path' => $this->category_icon_path
                ? Storage::url($this->category_icon_path)
                : null,
            'additional'         => is_array($this->resource->additional)
                ? $this->resource->additional
                : json_decode($this->resource->additional, true),
            'created_at'         => $this->created_at,
            'updated_at'         => $this->updated_at,
        ];
    }
}
