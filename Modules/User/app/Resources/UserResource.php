<?php

namespace Modules\User\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Comment\app\Resources\CommentResource;
use Modules\Post\app\Resources\PostResource;
use Modules\Profile\app\Resources\ProfileResource;
use Modules\Role\app\Resources\RoleResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'image'=>$this->getFirstMediaUrl('user_images'),
            'profile'=>ProfileResource::make($this->whenLoaded('profile')),
            'posts'=>PostResource::collection($this->whenLoaded('posts')),
            'comments'=>CommentResource::collection($this->whenLoaded('comments')),
            'roles'=>RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
