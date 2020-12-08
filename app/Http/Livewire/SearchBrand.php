<?php

namespace App\Http\Livewire;

use App\Brand;
use Livewire\Component;

class SearchBrand extends Component
{
	public $search = '';

    public function render()
    {

    	$brandsResults = [];
    	
    	if(strlen($this->search) > 2) {
    		$brandsResults = Brand::select('name', 'id')->where('name', 'like', '%'.$this->search.'%')->orWhere('description', 'like', '%'.$this->search.'%')->get();
    	}    	
        return view('livewire.search-brand', [
        	'brandsResults' => $brandsResults
        ]);
    }
}
