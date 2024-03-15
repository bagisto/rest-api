<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing\SearchSEO;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchSynonymResource extends JsonResource
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
            "id"         => $this->id,
            "name"       => $this->name,
            "terms"      => $this->terms,
            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
       ];
    }
}