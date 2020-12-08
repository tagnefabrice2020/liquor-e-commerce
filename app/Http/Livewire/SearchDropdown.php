<?php

namespace App\Http\Livewire;

use DB;
use App\Product;
use Livewire\Component;

class SearchDropdown extends Component
{
	public $search;
	public $addr = 1;

    public function render()
    {
    	$searchResults = [];

    	// dd($this->addr);
    	if(strlen($this->search) > 2) { 
	    	$searchResults = DB::table('products')
	    		->where('name', 'like', '%'.$this->search.'%')
	    		->join('product_volumes', function($join) {
	    			$join->on('products.id', '=', 'product_volumes.product_id')
	    				->where('product_volumes.sh_location_id', '=', $this->addr);
	    		})
	    		->get();
	    		// dump($searchResults);
	    } 
	    
        return view('livewire.search-dropdown', ['searchResults'=>$searchResults]);
    }
}

// select 
// 	p.id p_id, 
//     p.name pn, 
//     pv.product_id pv_p_id, 
//     pv.sh_location_id l_id 
// from
// 	products p 
// inner JOIN
// 	product_volumes pv
// ON 
// 	p.id = pv.product_id
// where 
// 	p.name like '%bow%' and pv.sh_location_id = 1
// group by p.name, pv.sh_location_id