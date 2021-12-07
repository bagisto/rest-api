<?php

namespace Webkul\RestApi\Http\Resources\V1\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'code'        => $this->code,
            'type'        => $this->type,
            'name'        => $this->name,
            'swatch_type' => $this->swatch_type,
            'options'     => AttributeOptionResource::collection($this->options),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
