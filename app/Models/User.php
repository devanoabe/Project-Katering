<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    protected $table = 'users';
    
    protected $fillable = [
        'user_id',
        'name', 
        'username', 
        'password',  
        'email',
        'telepon',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected function role(): Attribute {
    //     return new Attribute(
    //         get: fn($value) => ["user", "admin"][$value],
    //     );
    // }
}