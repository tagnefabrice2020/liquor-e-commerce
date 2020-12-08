<?php

namespace App;

use App\Brand;
use App\Volume;
use App\Category;
use App\Sh_location;
use App\Productvolume;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category () {
        return $this->BelongsTo(Category::class);
    }

    public function volume () {
        return $this->belongsTo(Volume::class);
    }

    public function volumes () {
        return $this->belongsToMany(Volume::class, 'product_volumes');
    }

    public function locations () {
    	return $this->belongsTo(Sh_location::class);
    }

    public function productVolumes () {
    	return $this->hasMany(Productvolume::class);
    }

    public function brand () {
        return $this->belongsTo(Brand::class);
    }
}
