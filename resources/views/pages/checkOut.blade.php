@extends('layout')

@section('title', '')

@section('heading')
  set your information and checkout.
@endsection

@section('content')
<div class="container mb-5">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{url('images/logo/logo.png')}}" alt="" width="72" height="72">
        <h2>CHECKOUT</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-3 offset-md-1 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">{{__('products.your cart')}}</span>
            <span class="badge badge-secondary badge-pill">{{Cart::content()->count()}}</span>
          </h4>
          <ul class="list-group mb-3">
          	@foreach (Cart::content() as $key => $product)
          		<li class="list-group-item d-flex justify-content-between lh-condensed">
	              <div> 
	                <P class="my-0">{{$product->name->name}}</P>
	                <small class="text-muted">{{__('products.quantity')}}: {{$product->qty}}</small>
	              </div>
	              <span class="text-muted">{{$product->price}} <small>FCFA</small></span>
	            </li>
          	@endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (FCFA)</span>
              <strong>{{Cart::subtotal()}}</strong>
            </li>
          </ul>

         {{--  <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form> --}}
        </div>
        <div class="col-md-7 order-md-1 order-md-1">
          {{-- <h4 class="mb-3">Billing address</h4> --}}
          @include('_partials._message')
          <form class="needs-validation" method="post" action="{{route('orderProduct')}}">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">{{__('auth.first_name')}}</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                    @if ($errors->has('first_name')) <small class="form-text text-muted error">{{ $errors->first('first_name') }}</small> @endif
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">{{__('auth.last_name')}}</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  @if ($errors->has('last_name')) <small class="form-text text-muted error">{{ $errors->first('last_name') }}</small> @endif
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">{{__('auth.email')}} <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                 @if ($errors->has('email')) <small class="form-text text-muted error">{{ $errors->first('email') }}</small> @endif
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Contact (Whatsapp) <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="email" name="phonenumber" placeholder="6*4 *** ***">
              <div class="invalid-feedback">
                 @if ($errors->has('phonenumber')) <small class="form-text text-muted error">{{ $errors->first('phonenumber') }}</small> @endif
              </div>
            </div>

            <div class="mb-3">
              <label for="address">{{__('products.shipping address')}}</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Odza Entree Koweit" required>
              <div class="invalid-feedback">
                @if ($errors->has('address')) <small class="form-text text-muted error">{{ $errors->first('address') }}</small> @endif
              </div>
            </div>

            <input type="hidden" name="total" value="{{Cart::subtotal()}}">      
            <hr class="mb-4">
            @if(count(Cart::content()) > 0)
              <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            @endif
          </form>
        </div>
      </div>
  </div>
@endsection