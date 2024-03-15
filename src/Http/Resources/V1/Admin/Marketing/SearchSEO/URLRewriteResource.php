<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing\SearchSEO;

use Illuminate\Http\Resources\Json\JsonResource;

class URLRewriteResource extends JsonResource
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
            'entity_type'   => $this->entity_type,
            'request_path'  => $this->request_path,
            'target_path'   => $this->target_path,
            'redirect_type' => $this->redirect_type,
            'locale'        => $this->locale,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}