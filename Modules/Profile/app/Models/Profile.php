<?php

namespace Modules\Profile\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Profile\Database\factories\ProfileFactory;
use Modules\User\app\Models\User;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'bio',
        'address',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(
            User::class,
            'user_id',
            'id',
            'user',
        );
    }
}
