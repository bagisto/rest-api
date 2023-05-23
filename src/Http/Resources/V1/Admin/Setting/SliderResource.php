<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'title'         => $this->title,
            'path'          => $this->path,
            'image_url'     => $this->image_url,
            'content'       => $this->content,
            'slider_path'   => $this->slider_path,
            'channel_id'    => $this->channel_id,
            'channel'       => new ChannelResource($this->channel),
            'locale'        => $this->locale,
            'sort_order'    => $this->sort_order,
            'expired_at'    => $this->expired_at,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
