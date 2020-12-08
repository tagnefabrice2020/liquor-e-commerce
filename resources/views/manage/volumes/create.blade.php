@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600;">AJOUTER LE VOLUME</h4></header>
		 <form action="{{route('volumes.store')}}" method="post">
      	  @csrf
          <div class="form-group">
          	<label>Le Volume</label>
			<input name="quantity" class="form-control" placeholder="example '1L', '350ML'" type="text">
			@if ($errors->has('quantity')) <small class="form-text text-muted error">{{ $errors->first('quantity') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
			  <label>Status</label>
			  <select id="inputState" class="form-control" name="status">
			    <option> Choose your status...</option>
			      <option value="1">active</option>
			      <option value="0">inactive</option>
			  </select>
			  @if ($errors->has('status')) <small class="form-text text-muted error">{{ $errors->first('status') }}</small> @endif
			</div> 
     
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-block"> enregistre <i class="fa fa-save"></i>  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection