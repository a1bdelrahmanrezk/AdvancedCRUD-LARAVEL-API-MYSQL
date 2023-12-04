<?php

namespace Modules\User\app\Models;

use Modules\Post\app\Models\Post;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Comment\app\Models\Comment;
use Modules\Profile\app\Models\Profile;
use Modules\Role\app\Models\Role;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_user',
            'user_id',
            'role_id',
            'id',
            'id',
            'roles'
        );
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->width(100);
    }
}
