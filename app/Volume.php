<?php

namespace App;

use App\Product;
use App\Productvolume;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    public function products () {
        return $this->belongsToMany(Product::class, 'product_volumes');
    }

    public function volume_products () {
    	return $this->hasMany(Productvolume::class);
    }
}
