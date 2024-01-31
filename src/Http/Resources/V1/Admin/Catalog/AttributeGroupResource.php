<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeGroupResource extends JsonResource
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
            'id'          => $this->id,
            'code'        => $this->code,
            'name'        => $this->name,
            'swatch_type' => $this->swatch_type,
            'attributes'  => AttributeResource::collection($this->custom_attributes),
        ];
    }
}
