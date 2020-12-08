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
    @livewire('search-carousel')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table roundedCorners" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>status</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($carousels as $carousel)
                		<tr>
	                        <td><small>{{$carousel->id}}</small></td>
	                        <td><small>{{$carousel->name}}</small></td>
                            <td><small>{{$carousel->description}}</small></td>
	                        <td>
                                @if($carousel->status == 1) 
                                    <small><span class="alert-success">active</span></small>
                                @else
                                    <small><span class="alert-danger">in active</span></small>
                                @endif
                            </td>
	                        <td><small>{{date('d m, Y', strtotime($carousel->created_at))}}</small></td>
	                        <td><small>{{date('d m, Y', strtotime($carousel->created_at))}}</small></td>
                        	<td>
                                <a href="{{route('carousels.edit', $carousel->id)}}"class="btn btn-info btn-sm">   <i class="fas fa-pen-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                    	</tr>
                	@endforeach                 
                </tbody>
            </table>
            {{$carousels->links()}}
        </div>
    </div>
</div>
</div>
</main>

</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection