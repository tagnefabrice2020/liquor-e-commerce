<?php

namespace App\Http\Controllers\Pages;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductPageController extends Controller
{
    public function productPage ($category) {
    	$category = Category::select('id')->where('name',$category)->first();
    	$products = $category->products()->paginate(12);
    	$totalProducts = $category->products()->count();
    	return view('pages.product')->with(['products'=>$products, 'c_id'=>$category->id, 'totalProducts'=>$totalProducts]);
    }
}
