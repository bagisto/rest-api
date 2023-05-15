<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryStateResource extends JsonResource
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
            'id'            => $this->id,
            'country_code'  => $this->country_code,
            'code'          => $this->code,
            'default_name'  => $this->default_name,
            'country_id'    => $this->country_id,
        ];
    }
}
