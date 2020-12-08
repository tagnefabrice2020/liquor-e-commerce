<?php

namespace App\Http\Livewire;

use App\Order;
use Livewire\Component;

class SearchOrders extends Component
{
	public $search; 

    public function render()
    {
    	$ordersResults = [];
    	if (strlen($this->search) > 2) {
    		$ordersResults = Order::where('first_name', 'like', '%'.$this->search.'%')
    			->orWhere('last_name', 'like', '%'.$this->search.'%')
    			->orWhere('phonenumber','like', '%'.$this->search.'%')
    			->orWhere('email', 'like', '%'.$this->search.'%')
    			->orWhere('address', 'like', '%'.$this->search.'%')
    			->orWhere('amount', 'like', '%'.$this->search.'%')
    			->get();
    	}
    	// dd($this->search);
        return view('livewire.search-orders', ['ordersResults'=>$ordersResults]);
    }
}
