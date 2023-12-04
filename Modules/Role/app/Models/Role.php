<?php

namespace Modules\Role\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Role\Database\factories\RoleFactory;
use Modules\User\app\Models\User;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
    ];
    public function users(){
        return $this->belongsToMany(
            User::class,
            'role_user',
            'role_id',
            'user_id',
            'id',
            'id',
            'users',
        );
    }
}
