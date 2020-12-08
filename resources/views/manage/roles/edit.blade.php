@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:412px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body" >
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600;">MODIFIER LE ROLE</h4></header>
		 <form action="{{route('roles.update', $role->id)}}" method="post">
      	  @csrf
          @method('PUT')
            @include('_partials._message')
          <div class="form-group">
          	<label>Nom du rôle</label>
			<input name="name" class="form-control" value="{{$role->name}}" placeholder="category name" type="text">
			@if ($errors->has('name')) <small class="form-text text-muted error">{{ $errors->first('name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group">
          	<label>Nom d'affichage</label>
			<input name="display_name" value="{{$role->display_name}}" class="form-control" placeholder="display name" type="text">
			@if ($errors->has('display_name')) <small class="form-text text-muted error">{{ $errors->first('display_name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group">
          	<label>Description</label>
			<input name="description" value="{{$role->description}}" class="form-control" placeholder="description" type="text">
			@if ($errors->has('description')) <small class="form-text text-muted error">{{ $errors->first('description') }}</small> @endif
          </div> <!-- form-group// -->

         <div class="form-row">
            <div class="form-group">
            <label>permissions</label><br />
              @foreach($permissions as $permission) 
                <input type="checkbox" 
                  @foreach ($role->permissions as $key => $value) {
                    @if($permission->id == $value->id)
                      checked 
                    @endif
                  @endforeach
                  name="permissions[{{$permission->id}}]" value="{{$permission->id}}">
                <label for="male">{{$permission->name}}</label><br>
              @endforeach
          </div> <!-- form-group end.// -->  
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