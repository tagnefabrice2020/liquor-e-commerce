@extends('layout')

@section('title', '')


@section('content')
<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h5 class="title-page" style="color: #fff; text-transform: uppercase;">{{__('products.shoppingCart')}}</h5>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ==========
	=============== -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<main class="col-md-9">
<div class="card" style="border-radius: 2px!important;
    border-color: #81233e;">

<table class="table table-borderless table-shopping-cart">
	<thead class="text-muted">
		<tr class="small text-uppercase">
  <th scope="col" style="font-weight: 600;color: #505050;">{{__('products.product')}}</th>
  <th scope="col" width="120" style="font-weight: 600;color: #505050;">{{__('products.quantity')}}</th>
  <th scope="col" width="120" style="font-weight: 600;color: #505050;">{{__('products.price')}}</th>
  <th scope="col" class="text-right" width="200"> </th>
		</tr>
	</thead>
	<tbody>
		@if(Cart::content()->count()>0)
		@foreach(Cart::content() as $key => $product)
			<tr>
				<td>
					<figure class="itemside">
						<div class="aside"><img src="{{url($product->name->image_url)}}" class="img-sm" style="object-fit: contain;"></div>
						<figcaption class="info">
							<a href="#" class="title text-dark"></a>
							<p class="text-muted small">{{$product->name->name}}<br> 
								{{
									App\Volume::select('quantity')
										->where('id', \App\Productvolume::select('volume_id')->where('id', $product->id)->first()->volume_id)->first()->quantity
								}}
							{{-- Brand: Gucci --}}</p>
						</figcaption>
					</figure>
				</td>
				<td> 
					<select class="form-control" name="qty" disabled>
						@for($i=1;$i<=(\App\Productvolume::select('quantity')->where('id',$product->id)->first()->quantity); $i++)
							@if($product->qty == $i) 
								<option value="{{$i}}" selected>{{$i}}</option>
							@else
								<option value="{{$i}}">{{$i}}</option>
							@endif
						@endfor
					</select> 
				</td>
				<td colspan="2"> 
					<div class="price-wrap"> 
						<small class=" text-muted">{{$product->qty * $product->price}} FCFA total</small> <br>
						<small class="text-muted"> {{$product->price}} FCFA {{__('products.each')}} </small> 
					</div> <!-- price-wrap .// -->
				</td>
				<td class="text-right d-flex">
					{{-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> --}}
					<a href="{{route('removeItemFromCart', $key)}}" class="btn btn-danger btn"><i class="fas fa-trash"></i></a>								
				</td>
				</td>
			</tr>
		@endforeach
		@else
			<tr>
				<td>Go shopping, you got no product in cart</td>
			</tr>
		@endif
	</tbody>
</table>

<div class="card-body">
	@if(Cart::content()->count() > 0)
		<a href="{{route('checkOut')}}" class="btn btn-primary float-md-right go-shopping-button"> {{__('products.purchase')}} <i class="fa fa-chevron-right"></i> </a>
	@endif
	<a href="{{route('/')}}" class="btn btn-light go-shopping-button"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
</div>	
</div> <!-- card.// -->
</main> <!-- col.// -->
	<aside class="col-md-3">
		{{-- <div class="card mb-3">
			<div class="card-body">
			<form>
				<div class="form-group">
					<label>Have coupon?</label>
					<div class="input-group">
						<input type="text" class="form-control" name="" placeholder="Coupon code">
						<span class="input-group-append"> 
							<button class="btn btn-primary">Apply</button>
						</span>
					</div>
				</div>
			</form>
			</div>  --}}
			<!-- card-body.// -->
		{{-- </div>   --}}
		<!-- card .// -->
		<div class="card total-price-section">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt style="font-weight: 100;color: #505050;text-transform: uppercase; font-size: 12px">{{__('products.total price')}}:</dt>
					  <dd class="text-right" style="font-weight: 600;color: #81233e; font-size: 12px">{{Cart::subtotal()}} <span class="currency-font">FCFA</span></dd>
					</dl>
					{{-- <dl class="dlist-align">
					  <dt>Discount:</dt>
					  <dd class="text-right">USD 658</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Total:</dt>
					  <dd class="text-right  h5"><strong>$1,650</strong></dd>
					</dl> --}}
					{{-- <hr>
					<p class="text-center mb-3">
						<img src="images/misc/payments.png" height="26">
					</p> --}}
					
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection