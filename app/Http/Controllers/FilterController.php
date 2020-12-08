<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Productvolume;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function sort (Request $request) {
    	$c_id = $request->c_id;
    	// dd($c_id);
    	if ($request->has('sort')) {

    		$sort_type = $request->sort;
    		switch ($request->sort) {
    			case 'aToz':
    				$products = Product::where('category_id', $request->c_id)
    					->orderBy('name','asc')
    					->get();
    				break;
    			case 'asc_price':
    				$products = Product::where('category_id', $request->c_id)
    					->orderBy('price', 'asc')
    					->get();
    				break;
    			case 'desc_price':
    				$products = Product::where('category_id', $request->c_id)
    					->orderBy('price', 'desc')
    					->get();
    				break;
    			default:
    				return redirect()->back();
    				break;
    		}
    	} else if ($request->has('category_id')) { //dd($request->category_id);
    		$sort_type = $request->category_id;
    		// dd($request);
    		$products = Product::where('category_id',$request->category_id)
    			->orderBy('created_at', 'desc')
    			->get();
    	} elseif ($request->has('volume_id')) {
    		$sort_type = $request->volume_id;
    		$volume = true;
    		$products = Productvolume::where('volume_id',$request->volume_id)
    			->with(['product'])
    			->get();
    		return view('pages.productsVolumeFilter')->with(['products'=>$products, 'c_id'=> $c_id, 'sort_type' => $sort_type, 'volume'=>$volume]);
    		// dd($products[0]->product->image_url);
    	}
    	
    	return view('pages.product')->with(['products'=>$products, 'c_id'=>$c_id, 'sort_type' => $sort_type]);
    }


    public function filter (Request $request) {
        $name = $request->name;
        $value = $request->value;
        if ($name == "sort") {
            if ($value == "aToz") {
                $products = Product::orderBy('name','asc')
                    ->get();
            } else if ($value == "asc_price") {
                $products = Product::orderBy('price', 'asc')
                    ->get();
            } else if ($value == "desc_price") {
                $products = Product::orderBy('price', 'desc')
                    ->get();
            } else if ($value == "relevance") {
                 //
            }
        }
        else if ($name == "category") {
            $category = Category::select('id')->where('name', $value)->first();
            $products = Product::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($name == "volume") {
            $products = Productvolume::where('volume_id',$value)->with(['product', 'volume'])
                ->get();
        }
    	return $products;
    }
}
