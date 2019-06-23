<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeUsername($query, $username) {
        if($username) {
            $query->where('name', 'like', $username . '%');
        }
    }

    public function scopeActivo($query, $activo) {
        if($activo) {
            $query->where('activo', 1);
        } else {
            $query->where('activo', 0);
        }
    }

    public function scopeEmail($query, $email) {
        $query->where('email', $email);
    }


}
