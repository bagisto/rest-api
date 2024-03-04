<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationResource extends JsonResource
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
            'id'                => $this->id,
            'code'              => $this->code,
            'value'             => $this->value,
            'channel_code'      => $this->channel_code,
            'locale_code'       => $this->locale_code,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
