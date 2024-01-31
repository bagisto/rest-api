<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Marketing;

use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\RestApi\Http\Resources\V1\Admin\Customer\CustomerGroupResource;

class CampaignResource extends JsonResource
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
            'id'             => $this->id,
            'name'           => $this->name,
            'subject'        => $this->subject,
            'status'         => $this->status,
            'type'           => $this->type,
            'mail_to'        => $this->mail_to,
            'spooling'       => $this->spooling,
            'channel_id'     => $this->channel_id,
            'customer_group' => new CustomerGroupResource($this->customer_group),
            'template'       => new TemplateResource($this->email_template),
            'event'          => new EventResource($this->event),
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
