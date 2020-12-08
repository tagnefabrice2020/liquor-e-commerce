@extends('layout')

@section('title', 'register your self')

@section('heading')
  {{__('auth.registerHeader')}}
@endsection

@section('content')
	
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
  <div class="card mx-auto" style="max-width:520px; margin-top:40px;border-radius: 4px;">
      <article class="card-body">
    <header class="mb-4"><h4 class="card-title sign-up-txt">{{__('auth.sign up')}}</h4></header>
    <form method="post" action="{{route('register')}}">
      {{csrf_field()}}
    
      @include('_partials._message')
        <div class="form-row">
          <div class="col form-group">
            <label>{{__('auth.first_name')}}</label>
              <input type="text" name="first_name" class="form-control" placeholder="">
              @if ($errors->has('first_name')) <small class="form-text text-muted error">{{ $errors->first('first_name') }}</small> @endif
          </div> <!-- form-group end.// -->
          <div class="col form-group">
            <label>{{__('auth.last_name')}}</label>
              <input type="text" name="last_name" class="form-control" placeholder="">
              @if ($errors->has('last_name')) <small class="form-text text-muted error">{{ $errors->first('last_name') }}</small> @endif
          </div> <!-- form-group end.// -->
        </div> <!-- form-row end.// -->
        <div class="form-group">
          <label>{{__('auth.email')}}</label>
          <input type="email" name="email" class="form-control" placeholder="">
          {{-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
          @if ($errors->has('email')) <small class="form-text text-muted error">{{ $errors->first('email') }}</small> @endif
        </div> <!-- form-group end.// -->
        {{-- <div class="form-group">
          <label class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" checked="" type="radio" name="gender" value="option1">
            <span class="custom-control-label"> Male </span>
          </label>
          <label class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="gender" value="option2">
            <span class="custom-control-label"> Female </span>
          </label>
            @if ($errors->has('gender')) <small class="form-text text-muted error">{{ $errors->first('gender') }}</small> @endif
        </div>  --}}
        <!-- form-group end.// -->
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>{{__('auth.createPassword')}}</label>
              <input name="password" class="form-control" type="password">
                @if ($errors->has('password')) <small class="form-text text-muted error">{{ $errors->first('password') }}</small> @endif
          </div> <!-- form-group end.// --> 
          <div class="form-group col-md-6">
            <label>{{__('auth.repeatPassword')}}</label>
              <input name="password_confirmation" class="form-control" type="password">
               @if ($errors->has('password_confirmation')) <small class="form-text text-muted error">{{ $errors->first('password_confirmation') }}</small> @endif
          </div> <!-- form-group end.// -->  
        </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block register-btn"> {{__('auth.register')}}  </button>
          </div> <!-- form-group// -->      
         {{--  <div class="form-group"> 
                <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#" class="terms-and-conditions">terms and contitions</a>  </div> </label>
            </div> --}} <!-- form-group end.// -->           
      </form>
    </article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">{{__('auth.haveAnAccount')}}? <a href="{{route('login')}}" class="login">{{__('auth.login')}}</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection

@section('scripts')
@endsection