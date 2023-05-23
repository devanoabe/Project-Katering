<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// sanctum
use Laravel\Sanctum\HasApiTokens;
use App\Models\Produk;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'name', 
        'username', 
        'password',  
        'email',
        'telepon',
        'role',  
    ];

    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = $value ?: 0;
    }

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