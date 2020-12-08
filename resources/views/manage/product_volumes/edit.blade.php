@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:720px; margin-top:40px;">
      <article class="card-body" style="box-shadow: 2px 5px 10px rgba(0,0,0,.28)">
		<header class="mb-4"><h4 class="card-title sign-up-txt">EDIT PRODUCT VOLUMES TO <small>{{$product_volume->product['name']}}</small></h4></header>
		 <form action="{{route('update.product_volume', $product_volume->id)}}" method="post" enctype="multipart/form-data">
      	  @csrf
          @method('PUT')
      	  @include('_partials._message')
          <input type="hidden" name="product_id" value="{{$product_volume->product_id}}">
          <div class="form-row">
          	<div class="form-group col-md-4">
                    <label>Price</label>
                    <input type="number" name="price" value="{{$product_volume->price}}" class="form-control">
                    @if ($errors->has('price')) <small class="form-text text-muted error">{{ $errors->first('price') }}</small> @endif
               </div>
          	<div class="form-group col-md-4">
          		<label>Quantity</label>
          		<input type="text" name="quantity" value="{{$product_volume->quantity}}" class="form-control">
          		@if ($errors->has('quantity')) <small class="form-text text-muted error">{{ $errors->first('quantity') }}</small> @endif
          	</div>
          	<div class="form-group col-md-4">
          		<label>Product Volume</label>
          		<select class="form-control" name="volume_id">
          			@foreach($volumes as $volume)
          				<option value="{{$volume->id}}" @if($volume->id == $product_volume->volume_id) selected @endif>{{$volume->quantity}}</option>
          			@endforeach
          		</select>
          		@if ($errors->has('volume_id')) <small class="form-text text-muted error">{{ $errors->first('volume_id') }}</small> @endif
          	</div>
          </div>
          <div class="form-row">
          	
          	<div class="form-group col-md-4">
          		<label>Shop Location</label>
          		<select class="form-control" name="sh_location_id">
          			@foreach($locations as $location)
          				<option value="{{$location->id}}" @if($location->id == $product_volume->location_id) selected @endif>{{$location->name}}</option>
          			@endforeach
          		</select>
          		 @if ($errors->has('sh_location_id')) <small class="form-text text-muted error">{{ $errors->first('sh_location_id') }}</small> @endif
          	</div>
          	<div class="form-group col-md-4">
          		<label>units</label>
          		<select name="units" class="form-control">
          			<option value="crate" @if($product_volume->units == 'crate') selected @endif>crate</option>
          			<option value="bottle" @if($product_volume->units == 'bottle') selected @endif>bottle</option>
          			<option value="carton" @if($product_volume->units == 'carton') selected @endif>carton</option>
          		</select>
          		 @if ($errors->has('units')) <small class="form-text text-muted error">{{ $errors->first('units') }}</small> @endif
          	</div>
            <div class="form-group col-md-4">
        <label>Stock status</label>
        <select name="stock_status" class="form-control" disabled>
          <option value="in stock" @if($product_volume->stock_status == 'in stock') selected @endif>in stock</option>
          <option value="out of stock" @if($product_volume->stock_status == 'out of stock') selected @endif>out of stock</option>
        </select>
         @if ($errors->has('stock_status')) <small class="form-text text-muted error">{{ $errors->first('stock_status') }}</small> @endif
      </div>
          </div>
          <div class="form-row">
         {{--  <div class="form-group col-md-6">
			  <label>Status</label>
			  <select id="inputState" class="form-control" name="status">
			    <option> Choose your status...</option>
			      <option value="1">active</option>
			      <option value="0">inactive</option>
			  </select>
			  @if ($errors->has('status')) <small class="form-text text-muted error">{{ $errors->first('status') }}</small> @endif
			</div>  --}}
			
		</div>
		
     
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-block"> SAVE  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection