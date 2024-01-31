<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Velocity;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
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
            'id'             => $this->id,
            'title'          => $this->title,
            'position'       => $this->position,
            'page_link'      => $this->page_link,
            'link_target'    => $this->link_target,
            'content_type'   => $this->content_type,
            'custom_title'   => $this->custom_title,
            'custom_heading' => $this->custom_heading,
            'catalog_type'   => $this->catalog_type,
            'products'       => $this->products,
            'description'    => $this->description,
            'status'         => $this->status,
            'updated_at'     => $this->updated_at,
            'created_at'     => $this->created_at,
        ];
    }
}
