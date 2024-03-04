<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
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
            'id'         => $this->id,
            'code'       => $this->code,
            'name'       => $this->name,
            'symbol'     => $this->symbol,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
