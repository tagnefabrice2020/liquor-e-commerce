@extends('layout')

@section('title', 'login')

@section('heading')
  {{__('auth.loginHeader')}}
@endsection

@section('content')
	
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto login-section">
      <article class="card-body login-box">
		<header class="mb-4"><h4 class="card-title sign-up-txt">{{__('auth.sign in')}}</h4></header>
		 <form method="" action="{{route('sign_in')}}">
      @csrf
      	  {{-- <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Sign in with Facebook</a> --}}
      	  {{-- <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Sign in with Google</a> --}}
          @include('_partials._message')
          <div class="form-group">
			 <input name="email" class="form-control" placeholder="{{__('auth.email')}}" type="text">
       @if ($errors->has('email')) <small class="form-text text-muted error">{{ $errors->first('email') }}</small> @endif
          </div> <!-- form-group// -->
          <div class="form-group">
			<input name="password" class="form-control" placeholder="{{__('auth.password')}}" type="password">
      @if ($errors->has('password')) <small class="form-text text-muted error">{{ $errors->first('password') }}</small> @endif
          </div> <!-- form-group// -->
          
          <div class="form-group">
          	<a href="{{route('emailPasswordResetView')}}" class="float-right" style="font-size: 12px;">{{__('auth.forgotPassword')}}?</a> 
            <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label" style="font-size: 12px;"> {{__('auth.rememberMe')}} </div> </label>
          </div> <!-- form-group form-check .// -->
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block login-btn"> {{__('auth.login')}}  </button>
          </div> <!-- form-group// -->    
      </form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">{{__('auth.newClient')}}? <a href="{{route('register', app()->getLocale())}}" class="login">{{__('auth.register')}}</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection

@section('scripts')
@endsection