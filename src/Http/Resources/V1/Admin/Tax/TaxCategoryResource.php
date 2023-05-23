<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Tax;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxCategoryResource extends JsonResource
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
            'description' => $this->description,
            'rates'       => TaxRateResource::collection($this->tax_rates),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
