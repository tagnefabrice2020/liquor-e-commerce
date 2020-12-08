@extends('layout')

@section('title', 'Reset password')

@section('heading')
  {{--  {{__('auth.loginHeader')}} --}}
@endsection

@section('content')
	
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto login-section">
      <article class="card-body login-box">
		<header class="mb-4"><h4 class="card-title sign-up-txt">{{__('auth.email')}}</h4></header>
		 <form method="post" action="{{route('reset_password_action')}}">
      @csrf
      @method('PATCH')
          @include('_partials._message')
          <div class="form-group">
			 <input name="email" class="form-control" placeholder="{{__('auth.email')}}" value="{{$email[0]->email}}"  type="hidden">
       @if ($errors->has('email')) <small class="form-text text-muted error">{{ $errors->first('email') }}</small> @endif
        </div> <!-- form-group// -->
         <div class="form-group">
            <label>{{__('auth.password')}}</label>
         <input name="password" class="form-control" placeholder="{{__('auth.password')}}" type="password">
      @if ($errors->has('password')) <small class="form-text text-muted error">{{ $errors->first('password') }}</small> @endif
    </div>
          <div class="form-group">
            <label>{{__('auth.repeatPassword')}}</label>
              <input name="password_confirmation" class="form-control" type="password">
               @if ($errors->has('password_confirmation')) <small class="form-text text-muted error">{{ $errors->first('password_confirmation') }}</small> @endif
          </div> <!-- form-group end.// -->  
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block login-btn"> {{__('auth.submit')}}  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">{{-- {{__('auth.newClient')}}?  --}}<a href="{{route('login')}}" class="login">{{__('auth.login')}}</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection

@section('scripts')
@endsection