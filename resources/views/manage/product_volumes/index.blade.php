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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>volume</th>
                        <th>quantity</th>
                        <th>Location</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
						<th>id</th>
                        <th>name</th>
                        <th>volume</th>
                        <th>quantity</th>
                        <th>Location</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </tfoot>
                <tbody>
                     
                	@foreach($product_volumes as $product_volume)
                		<tr>
                            {{-- @dd(); --}}
	                        <td>{{$product_volume->id}}</td>
                            <td>{{$product->name}}</td>
	                        <td>{{$product_volume->volume['quantity']}}</td>
                            <td>{{$product_volume->quantity}} {{$product_volume->units}}(s) </td>
                            <td><?php if(empty($product_volume->sh_location_id)) {echo 'not given';}else { echo $product_volume->location['name']; } ?></td>
	                        <td>{{date('d m, Y', strtotime($product_volume->created_at))}}</td>
	                        <td>{{date('d m, Y', strtotime($product_volume->updated_at))}}</td>
                        	<td>
                                <a href="{{route('product_volumes.edit', $product_volume->id)}}"class="btn btn-info btn"><i class="fas fa-pen-square"></i></a>
                              
                            </td>
                    	</tr>
                	@endforeach                 
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</main>

</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection