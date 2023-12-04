<?php

namespace Modules\Profile\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\app\Resources\UserResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'bio'=>$this->bio,
            'address'=>$this->address,
            'user_id'=>$this->user_id,
            'user'=>UserResource::make($this->whenLoaded('user')),
        ];
    }
}
