<?php

namespace Modules\Post\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Comment\app\Resources\CommentResource;
use Modules\User\app\Resources\UserResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            'file'=>$this->getFirstMediaUrl('post_files'),
            'comments'=>CommentResource::collection($this->whenLoaded('comments')),
            'user'=>UserResource::make($this->whenLoaded('user')),
        ];
    }
}
