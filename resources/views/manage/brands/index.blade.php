@extends('manage.manage-layout')

@section('title', 'DrinkCenter Ajouter un Label')

@section('manage-content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<main>
<div class="container-fluid">
<div class="card mb-4 col-md-12 mt-4">
    {{-- <div class="card-header" style="">
                
    </div> --}}
    @include('_partials._message')
    @livewire('search-brand')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table roundedCorners" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($brands as $brand)
                		<tr>
	                        <td><small>{{$brand->id}}</small></td>
	                        <td><small>{{$brand->name}}</small></td>
                            <td><small>{{$brand->description}}</small></td>
	                        <td><small>{{date('d m, Y', strtotime($brand->created_at))}}</small></td>
	                        <td><small>{{date('d m, Y', strtotime($brand->created_at))}}</small></td>
                        	<td>
                                <a href="{{route('brands.edit', $brand->id)}}"class="btn btn-info btn-sm">   <i class="fas fa-pen-square"></i>
                                </a>
                              {{--   <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
                            </td>
                    	</tr>
                	@endforeach                 
                </tbody>
            </table>
            {{$brands->links()}}
        </div>
    </div>
</div>
</div>
</main>

</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection