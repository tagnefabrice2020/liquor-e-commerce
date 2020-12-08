<?php

namespace App;

use App\Productvolume;
use Illuminate\Database\Eloquent\Model;

class Sh_location extends Model
{
    public function product_volumes () {
    	return $this->hasMany(Productvolume::class);
    } 
}
