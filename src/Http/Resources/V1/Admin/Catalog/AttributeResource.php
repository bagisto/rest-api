<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Catalog\AttributeOptionResource;

class AttributeResource extends JsonResource
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
            'id'                  => $this->id,
            'name'                => $this->name,
            'admin_name'          => $this->admin_name,
            'code'                => $this->code,
            'type'                => $this->type,
            'swatch_type'         => $this->swatch_type,
            'options'             => AttributeOptionResource::collection($this->options),
            'validation'          => $this->validation,
            'position'            => $this->position,
            'is_comparable'       => $this->is_comparable,
            'is_configurable'     => $this->is_configurable,
            'is_required'         => $this->is_required,
            'is_unique'           => $this->is_unique,
            'is_filterable'       => $this->is_filterable,
            'is_user_defined'     => $this->is_user_defined,
            'is_visible_on_front' => $this->is_visible_on_front,
            'use_in_flat'         => $this->use_in_flat,
            'value_per_locale'    => $this->value_per_locale,
            'value_per_channel'   => $this->value_per_channel,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}
