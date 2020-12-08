<?php

namespace App;

use App\Role;
use App\User;
use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public function users () {
    	return $this->belongsToMany(User::class);
    }

    public function roles () {
    	return $this->belongsToMany(Role::class);
    }
}
