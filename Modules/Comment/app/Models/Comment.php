<?php

namespace Modules\Comment\app\Models;

use Modules\Post\app\Models\Post;
use Modules\User\app\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Comment\Database\factories\CommentFactory;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id','user');
    }
    public function post(){
        return $this->belongsTo(Post::class,'post_id','id','post');
    }
}
