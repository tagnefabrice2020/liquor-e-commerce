<?php

namespace App\Http\Controllers\Pages;

use Auth;
use Cart;
use App\Product;
use App\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function homePage () {
    	$carousels = Carousel::where('status','1')->get();
    	$products = Product::take(10)->get();
        $bestSellingBeer = Product::where('category_id', '1')->take(6)->get();
        $wines = Product::where('category_id', '2')->inRandomOrder()->take(6)->get();
    	return view('pages.index')
    		->withCarousels($carousels)
    		->withProducts($products)
            ->withBestSellingBeers($bestSellingBeer)
            ->withWines($wines);
    }

    public function productSingle ($slug) {
    	$product = Product::where('slug', $slug)->first();
        $category = $product->category_id;
    	$products = Product::where('category_id', $category)->take(4)->get();
        $any = Product::inRandomOrder()->take(10)->get();
        $cart = Cart::content();
    	return view('pages.product_single')
            ->withProduct($product)
            ->withProducts($products)
            ->withCart($cart)
            ->withAny($any);    	
    }
}
