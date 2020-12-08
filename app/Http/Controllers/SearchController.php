<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public $address;
    public function search (Request $request) {
    	$this->address = $request->address;
    	if(strlen($request->search) > 2) { 
	    	$searchResults = DB::table('products')
	    		->where('name', 'like', '%'.$request->search.'%')
	    		->join('product_volumes', function($join) {
	    			$join->on('products.id', '=', 'product_volumes.product_id')
	    				->where('product_volumes.sh_location_id', '=', $this->address);
	    		})
	    		->get();
	    		return $searchResults;
	    	} 
	    
    }
}
