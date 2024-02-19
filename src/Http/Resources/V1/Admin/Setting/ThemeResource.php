<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class ThemeResource extends JsonResource
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
            ...$this->resource->toArray(),
        ];
    }
}
