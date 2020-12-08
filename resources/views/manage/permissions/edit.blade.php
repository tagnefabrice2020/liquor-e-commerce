@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600;">EDIT PERMISSION</h4></header>
		 <form action="{{route('permissions.update', $permission->id)}}" method="post">
      	  @csrf
          @method('PUT')
            @include('_partials._message')
          <div class="form-group">
          	<label>Nom de la permission</label>
			<input name="name" class="form-control" value="{{$permission->name}}" placeholder="category name" type="text">
			@if ($errors->has('name')) <small class="form-text text-muted error">{{ $errors->first('name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group">
          	<label>Nom d'affichage</label>
			<input name="display_name" value="{{$permission->display_name}}" class="form-control" placeholder="display name" type="text">
			@if ($errors->has('display_name')) <small class="form-text text-muted error">{{ $errors->first('display_name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group">
          	<label>Description</label>
			<input name="description" value="{{$permission->description}}" class="form-control" placeholder="description" type="text">
			@if ($errors->has('description')) <small class="form-text text-muted error">{{ $errors->first('description') }}</small> @endif
          </div> <!-- form-group// -->

         
     
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-block">modifier <i class="fa fa-save"></i></button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection