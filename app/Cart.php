<?php 
namespace App;

class Cart {
	public $cart = ['products'=>[], 'totalPrice'=>0];
	public $totalPrice = 0;
	public $product;
	public $products = [];

	public function __construct ($cart) {
		if ($cart) {
			$this->products = $cart['products'];
			$this->totalPrice = $cart['totalPrice'];
			$this->cart['products'] = $this->products;
			$this->cart['totalPrice'] = $this->totalPrice;
		}
		
	} 

	public function setProduct ($product) {
		$this->product = $product;
	}

	public function getProduct () {
		return $this->product;
	}

	public function setTotalPrice ($price) {
		$this->totalPrice = $price;
	}

	public function getTotalPrice () {
		return $this->totalPrice;
	}

	public function setKey ($key) {
		$this->key = $key;
	}

	public function getKey () {
		return $this->key;
	}
	
	public function add ($product, $quantity) {
		$this->setProduct($product);
		$this->product = [
			'key'=> $this->product->id, 
			'product' => $this->product, 
			'quantity'=>$quantity, 
			'price'=>$quantity*$this->product->price
		];
		// dd($this->products);

		if (count($this->products) > 0) {
			foreach ($this->products as $key => $value) {
				// dd($key);
				if (in_array($product->key, $value)) {
					dd(true);
					// unset($key);
				} //dd(false);
			}  //dd();
			array_push($this->products, $this->product);
			$this->cart['products'] = $this->products;
			foreach ($this->cart['products'] as $key => $value) {
				$this->totalPrice += $value['price'];
			}
			$this->cart['totalPrice'] = $this->totalPrice;	
		} else {
			array_push($this->products, $this->product);
			$this->cart['products'] = $this->products;
			foreach ($this->cart['products'] as $key => $value) {
				$this->totalPrice += $value['price'];
			}
			$this->cart['totalPrice'] = $this->totalPrice;
			// dd($this->cart);
			return $this->cart;
		}
	}
}