<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeRateResource extends JsonResource
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
            'id'                    => $this->id,
            'rate'                  => $this->rate,
            'target_currency_id'    => $this->target_currency,
            'target_currency'       => new CurrencyResource($this->currency),
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
        ];
    }
}
