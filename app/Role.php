<?php

namespace App;

use App\User;
use App\Permission;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public function users () {
    	return $this->belongsToMany(User::class);
    }

    public function permissions () {
    	return $this->belongsToMany(Permission::class);
    }
}
