@extends('manage.manage-layout')

@section('title', 'Ajouter un carrousel')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body" style="/*box-shadow: 2px 5px 10px rgba(0,0,0,.28)*/">
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600">AJOUTER UN LABEL</h4></header>
		 <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
      	  @csrf
          <div class="form-group">
          	<label><small>Nom de la marque</small></label>
			<input name="name" class="form-control" placeholder="Nom du carrousel" type="text">
			@if ($errors->has('name')) <small class="form-text text-muted error">{{ $errors->first('name') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
          	<label><small>Description de la marque</small></label>
			<textarea name="description" class="form-control" placeholder="Description du carrousel" type="text"></textarea>
			@if ($errors->has('description')) <small class="form-text text-muted error">{{ $errors->first('description') }}</small> @endif
          </div> <!-- form-group// -->
     
          <div class="form-group pt-1">
              <button type="submit" class="btn btn-success btn-block" style="border: 1px solid #28a745;"><small>enregistrer</small> <i class="fa fa-save"></i></button>
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