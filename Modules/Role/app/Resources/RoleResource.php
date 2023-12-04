<?php

namespace Modules\Role\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\app\Resources\UserResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'users'=>UserResource::collection($this->whenLoaded('users')),
        ];
    }
}
