<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing\SearchSEO;

use Illuminate\Http\Resources\Json\JsonResource;

class SitemapResource extends JsonResource
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
            "id"           => $this->id,
            "file_name"    => $this->file_name,
            "path"         => $this->path,
            "generated_at" => $this->generated_at,
            "updated_at"   => $this->updated_at,
            "created_at"   => $this->created_at,
       ];
    }
}