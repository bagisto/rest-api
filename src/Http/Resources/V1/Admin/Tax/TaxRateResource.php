<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Tax;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxRateResource extends JsonResource
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
            'identifier' => $this->identifier,
            'is_zip'     => $this->is_zip,
            'zip_code'   => $this->zip_code,
            'zip_from'   => $this->zip_from,
            'zip_to'     => $this->zip_to,
            'state'      => $this->state,
            'country'    => $this->country,
            'tax_rate'   => $this->tax_rate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
