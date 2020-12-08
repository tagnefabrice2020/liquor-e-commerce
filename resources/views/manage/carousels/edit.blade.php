@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title sign-up-txt">Modifier le carrousel</h4></header>
		 <form action="{{route('carousels.update', $carousel->id)}}" method="post" enctype="multipart/form-data">
      	  @csrf
      	  @method('PUT')
      	  @include('_partials._message')
          <div class="form-group">
          	<label><small>Nom du carrousel</small></label>
			<input name="name" class="form-control" value="{{$carousel->name}}" placeholder="carousel name" type="text">
			@if ($errors->has('name')) <small class="form-text text-muted error">{{ $errors->first('name') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
          	<label><small>Description du carrousel</small></label>
			<input name="description" value="{{$carousel->description}}" class="form-control" placeholder="carousel description" type="text">
			@if ($errors->has('description')) <small class="form-text text-muted error">{{ $errors->first('description') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
			  <label><small>Afficher le caroussel?</small></label>
			  <select id="inputState" class="form-control" name="status">
			    	<option> Choose your status...</option>
			      	<option value="1" @if($carousel->status == 1) selected @endif>active</option>
			      	<option value="0" @if($carousel->status == 0) selected @endif>inactive</option>
			  </select>
			  @if ($errors->has('status')) <small class="form-text text-muted error">{{ $errors->first('status') }}</small> @endif
			</div> 
			<div class="form-group">
				<label>image</label>
                <input type="file" name="image_url" value="" class="form-control image-preview-filename">
                @if ($errors->has('image_url')) <small class="form-text text-muted error">{{ $errors->first('image_url') }}</small> @endif
            </div>
     
          <div class="form-group pt-2">
              <button type="submit" class="btn btn-success btn-block">modifier <i class="fa fa-save"></i></button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
@section('styles')
@endsection

@section('scripts')
	
@endsection