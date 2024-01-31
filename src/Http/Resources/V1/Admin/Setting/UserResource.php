<?php

namespace Webkul\RestApi\Http\Resources\V1\Admin\Setting;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'       => $this->name,
            'email'      => $this->email,
            'status'     => $this->status,
            'role'       => new RoleResource($this->role),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
