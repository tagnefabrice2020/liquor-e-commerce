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
                        <th>first name</th>
                        <th>last name</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
						<th>id</th>
                        <th>first name</th>
                        <th>last name</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>actions</th>
                    </tr>
                </tfoot>
                <tbody>
                	@foreach($users as $user)
                		<tr>
	                        <td>{{$user->id}}</td>
	                        <td>{{$user->last_name}}</td>
	                        <td>{{$user->first_name}}</td>
	                        <td>{{date('d m, Y', strtotime($user->created_at))}}</td>
	                        <td>{{date('d m, Y', strtotime($user->updated_at))}}</td>
                                                
                        	<td> <a href="{{route('users.edit', $user->id)}}" class="btn btn-info btn"><i class="fas fa-pen-square"></i></a></td>
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