<?php

namespace App\Http\Livewire;

use App\Carousel;
use Livewire\Component;

class SearchCarousel extends Component
{
	public $search;

    public function render()
    {
    	$carouselsResults = [];
    	if (strlen($this->search)>2) {
    		$carouselsResults = Carousel::select('name', 'id')
    			->where('name', 'like', '%'.$this->search.'%')
    			->orWhere('name', 'like', '%'.$this->search.'%')
    			->get();
    	}
        return view('livewire.search-carousel', ['carouselsResults' => $carouselsResults]);
    }
}
