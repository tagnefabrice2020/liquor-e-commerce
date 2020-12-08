<?php

namespace App;

use App\Product_Volume;
use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    public function product_volume () {
    	return $this->belongsTo(Product_Volume::class);
    }
}
