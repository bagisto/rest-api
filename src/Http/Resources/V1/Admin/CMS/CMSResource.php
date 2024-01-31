<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\CMS;

use Illuminate\Http\Resources\Json\JsonResource;

class CMSResource extends JsonResource
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
            'id'               => $this->id,
            'layout'           => $this->layout,
            'content'          => $this->content,
            'url_key'          => $this->url_key,
            'html_content'     => $this->html_content,
            'meta_description' => $this->meta_description,
            'meta_title'       => $this->meta_title,
            'page_title'       => $this->page_title,
            'meta_keywords'    => $this->meta_keywords,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}
