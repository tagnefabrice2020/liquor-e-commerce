@extends('manage.manage-layout')

@section('title', 'Dashboard')

@section('manage-content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<main>
<div class="container-fluid">
<div class="card mb-4 col-md-12 mt-4">
    {{-- <div class="card-header" style="">
                
    </div> --}}
    @include('_partials._message')
     @livewire('search-orders')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table roundedCorners" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>noms du client</th>
                        <th>address</th>
                        <th>tel</th>
                        <th>prix</th>
                        <th>delivree</th>
                        <th>status</th>
                        <th>date</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       {{-- <th>id</th> --}}
                        <th>noms du client</th>
                        <th>address</th>
                        <th>tel</th>
                        <th>prix</th>
                        <th>delivree</th>
                        <th>status</th>
                        <th>date</th>
                        <th>action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            {{-- <td>{{order.id}}</td> --}}
                            <td>{{$order->last_name}} {{$order->first_name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phonenumber}}</td>
                            <td>{{$order->amount}} <small>xaf</small></td>
                            <td>@if($order->delivered == 0) <span style="color: red">non</span> @else <span style="color: green">oui</span> @endif</td>
                            <td>@if($order->status == 0) <span style="color: red">non</span> @else <span style="color: green">oui</span> @endif</td>
                            
                           
                            <td>{{date('D d, M Y', strtotime($order->created_at))}}</td>
                            <td><a href="{{route('viewOrder', $order->id)}}" class="btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
</div>
</div>
</main>

</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection