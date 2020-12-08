<?php

namespace App;

use App\Volume;
use App\Product;
use App\Sh_location;
use Illuminate\Database\Eloquent\Model;

class Productvolume extends Model
{
    protected $table = "product_volumes";

    public function product () {
    	return $this->belongsTo(Product::class);
    }

    public function volume () {
    	return $this->belongsTo(Volume::class);
    }

    public function location () {
    	return $this->belongsTo(Sh_location::class, 'location_id');
    }
}
