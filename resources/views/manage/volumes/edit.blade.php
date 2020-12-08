@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600">MODIFIER LE VOLUME</h4></header>
		 <form action="{{route('volumes.update', $volume->id)}}" method="post">
      	  @csrf
      	  @method('PUT')
          <div class="form-group">
          	<label>Le Volume</label>
			<input name="quantity" value="{{$volume->quantity}}" class="form-control" placeholder="volume Quantity with it's unit. example '1L'" type="text">
			@if ($errors->has('quantity')) <small class="form-text text-muted error">{{ $errors->first('quantity') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
			  <label>Status</label>
			  <select id="inputState" class="form-control" name="status">
			    <option value="1" @if($volume->status === 1) selected @endif>active</option>
			      <option value="0" @if($volume->status === 0) selected @endif>inactive</option>
			  </select>
			  @if ($errors->has('status')) <small class="form-text text-muted error">{{ $errors->first('status') }}</small> @endif
			</div> 
     
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-block"> modifier <i class="fa fa-save"></i>  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection