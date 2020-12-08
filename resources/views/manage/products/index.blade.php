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
                        <th>category</th>
                        <th>name</th>
                        <th>description</th>
                        
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
						<th>id</th>
                        <th>name</th>
                        <th>category</th>
                        <th>description</th>
                        
                       
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </tfoot>
                <tbody>
                	@foreach($products as $product)
                		<tr>
	                        <td>{{$product->id}}</td>
                            <td>{{$product->category['name']}}</td>
	                        <td>{{Illuminate\Support\Str::limit($product->name, 10)}}</td>
                            <td>{{Illuminate\Support\Str::limit($product->description, 20)}} </td>
                            
	                        <td>{{date('d m, Y', strtotime($product->created_at))}}</td>
	                        <td>{{date('d m, Y', strtotime($product->updated_at))}}</td>
                        	<td>
                                <a title="edit" href="{{route('products.edit', $product->id)}}"class="btn btn-info btn"><i class="fas fa-pen-square"></i></a>
                                <a title="add product volume" href="{{route('products.add_volume', $product->id)}}"class="btn btn-success btn"><i class="fas fa-wine-bottle"></i></a>
                                <a title="volumes" href="{{route('product_volume_index', $product->id)}}"class="btn btn-secondary btn"><i class="fa fa-list"></i></a>
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