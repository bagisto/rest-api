<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing\SearchSEO;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchTermResource extends JsonResource
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
            'id'           => $this->id,
            'term'         => $this->term,
            'redirect_url' => $this->redirect_url,
            'channel_id'   => $this->channel_id,
            'locale'       => $this->locale,
            'updated_at'   => $this->updated_at,
            'created_at'   => $this->created_at
        ];
    }
}