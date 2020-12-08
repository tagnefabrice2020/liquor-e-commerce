<?php

namespace App;

use App\Order;
use App\Role;
use App\Permission;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verification_token',
        'email_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles () {
    	return $this->belongsToMany(Role::class);
    }

    public function permissions () {
    	return $this->belongsToMany(Permission::class);
    }

    public function orders () {
        return $this->hasMany(Order::class);
    }
}
