<?php

namespace Modules\Post\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Comment\app\Models\Comment;
use Modules\Post\Database\factories\PostFactory;
use Modules\User\app\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id','user');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
