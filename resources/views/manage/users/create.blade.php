@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:600px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
      <article class="card-body">
		<header class="mb-4"><h4 class="card-title sign-up-txt" style="font-weight: 600;">AJOUTER UN UTILISATEUR</h4></header>
		 <form action="{{route('users.store')}}" method="post">
      	  @csrf
          <div class="form-row">
          <div class="form-group col-md-6">
          	<label>First Name</label>
			<input name="first_name" class="form-control" placeholder="first name" type="text">
			@if ($errors->has('first_name')) <small class="form-text text-muted error">{{ $errors->first('first_name') }}</small> @endif
          </div> <!-- form-group// -->
           <div class="form-group col-md-6">
          	<label>Last Name</label>
			<input name="last_name" class="form-control" placeholder="display name" type="text">
			@if ($errors->has('last_name')) <small class="form-text text-muted error">{{ $errors->first('last_name') }}</small> @endif
          </div> <!-- form-group// -->
        </div>
          <div class="form-group">
            <label>Email</label>
      <input name="email" class="form-control" placeholder="first name" type="text">
      @if ($errors->has('email')) <small class="form-text text-muted error">{{ $errors->first('email') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
          <label class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" checked="" type="radio" name="gender" value="option1">
            <span class="custom-control-label"> Male </span>
          </label>
          <label class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="gender" value="option2">
            <span class="custom-control-label"> Female </span>
          </label>
        </div> <!-- form-group end.// -->
          <div class="form-row">
          <div class="form-group col-md-6">
            <label>Create password</label>
              <input name="password" class="form-control" type="password">
                @if ($errors->has('password')) <small class="form-text text-muted error">{{ $errors->first('password') }}</small> @endif
          </div> <!-- form-group end.// --> 
          <div class="form-group col-md-6">
            <label>Repeat password</label>
              <input name="password_confirmation" class="form-control" type="password">
               @if ($errors->has('password_confirmation')) <small class="form-text text-muted error">{{ $errors->first('password_confirmation') }}</small> @endif
          </div> <!-- form-group end.// -->  
        </div>

        <div class="form-row">
            <div class="form-group">
            <label>Roles</label><br />
              @foreach($roles as $role) 
                <input type="checkbox" name="roles[{{$role->id}}]" value="{{$role->id}}">
                <label for="male">{{$role->name}}</label><br>
              @endforeach
          </div> <!-- form-group end.// -->  
        </div>
         
     
          <div class="form-group">
              <button type="submit" class="btn btn-success btn-block"> enregistrer <i class="fa fa-save"></i>  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection