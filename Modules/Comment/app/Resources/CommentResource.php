<?php

namespace Modules\Comment\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Post\app\Resources\PostResource;
use Modules\User\app\Resources\UserResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'comment'=>$this->comment,
            'post'=>PostResource::make($this->whenLoaded('post')),
            'user'=>UserResource::make($this->whenLoaded('user')),
        ];
    }
}
