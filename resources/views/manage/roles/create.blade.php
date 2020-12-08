@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600; ">AJOUTER UN ROLE</h4></header>
		 <form action="{{route('roles.store')}}" method="post">
      	  @csrf
          <div class="form-group">
          	<label>Nom du rôle</label>
			<input name="name" class="form-control" placeholder="role name" type="text">
			@if ($errors->has('name')) <small class="form-text text-muted error">{{ $errors->first('name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group">
          	<label>Nom d'affichage</label>
			<input name="display_name" class="form-control" placeholder="display name" type="text">
			@if ($errors->has('display_name')) <small class="form-text text-muted error">{{ $errors->first('display_name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group">
          	<label>Description</label>
			<input name="description" class="form-control" placeholder="description" type="text">
			@if ($errors->has('description')) <small class="form-text text-muted error">{{ $errors->first('description') }}</small> @endif
          </div> <!-- form-group// -->

         
     
          <div class="form-group pt-2">
              <button type="submit" class="btn btn-success btn-block"> enregistre <i class="fa fa-save"></i>  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection