@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="card mx-auto" style="max-width:812px; margin-top:40px; border-radius: 4px;
    border: 1px #ddd solid;">
    <div class="card-header">
      <h6><small>le panier de</small> @if($order->user_id != null) {{\User::select('name')->where('id', $order->user_id)->first()}} @else {{ $order->first_name}} {{$order->last_name}}, @endif Lieu: {{$order->address}}, Tel: {{$order->phonenumber}} </h6>
    </div>
     <div class="card-body">
      @include('_partials._message')
        <div class="table-responsive">
            <table class="table roundedCorners">
                <thead>
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>name</th>
                        <th>quantitee</th>
                        <th>volume</th>
                        <th>prix </th>
                        <th>sub total</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>name</th>
                        <th>quantitee</th>
                        <th>volume</th>
                        <th>prix</th>
                        <th></th>
                        <th>actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($cart as $key => $cartItem)
                      <tr>
                        <td>
                          {{$cartItem->name->name}}
                        </td>
                         <td>{{$cartItem->qty}} {{\App\Productvolume::select('units')->where('id', $cartItem->id)->first()->units}}<small>(s)</small></td>
                         <td>{{\App\Volume::select('quantity')->where('id', \App\Productvolume::select('volume_id')->where('id', $cartItem->id)->first()->volume_id)->first()->quantity}}</td>
                        <td>{{$cartItem->price}} <small>xaf</small></td>
                        <td>{{(float)$cartItem->price * (float) $cartItem->qty}} <small>xaf</small></td>
                      </tr>
                    @endforeach    
                    <tr>
                      <td colspan="4">Total</td>
                      <td>{{$order->total}} <small>xaf</small></td>
                      <td>
                        @if($order->delivered == 1 && $order->status == false)
                          <a href="{{route('confirmPayment', $order->id)}}" class="btn btn-sm btn-info btn-block">confirmer le paiement</a> <!--- envoie le recu-->
                        @elseif($order->delivered == 0)
                          <a href="#" class="btn btn-sm btn-info btn-block" disable>veuiller attendre</a>
                        @endif
                      </td>
                    </tr>         
                </tbody>
            </table>
        </div>
    </div>
  </div> <!-- card .// -->
   
   
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection