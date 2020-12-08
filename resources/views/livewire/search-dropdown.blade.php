<section class="header-main">
	<div class="search-container">
	<div class="row align-items-center search-content-section">
		<form action="#" class="search" style="width: 100%;">
			<div class="row">
				<div class="col-lg-8 col-12 col-sm-12 col-md-7" style="padding: 0;">
					
					<div class="input-group w-100">
						<div class="input-group-prepend" style="width: 0px !important;">
						    <span class="" id="basic-addon1"><i class="fa fa-search ml-5"></i></span>
						  </div>
						<!-- <span class="fa fa-search form-control-feedback"></span> -->
					    <input wire:model.debounce.500ms="search" type="text" class="form-control search-input" placeholder="What can we help you find ? " style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; padding-left: 70px;border-top-color: #fff;
    border-bottom-color: #fff;
    border-right-color: #82133E; border-left-color: #fff;">
				    </div>
				</div>
				{{-- <input type="hidden" name="" value="1"> --}}
				<div class="col-lg-3 col-12 col-sm-12 col-md-4" style="padding: 0;">
					<div class="input-group w-100">
						<select wire:model="addr" id="inputState"  class="form-control address-input"  style="border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-top-color: #fff;
    border-bottom-color: #fff; " name="location">

    						<option disabled>Enter a Delivery Addres</option>
    						@foreach($address_locations as $address)
    							<option value="{{$addr = $address->id}}" @if($address->id == 1) selected @endif >{{$address->name}}</option>
    						@endforeach
			      		</select>
					    <!-- <input type="text" class="form-control" placeholder="Enter a Delivery Address" style=" "> -->
				    </div>
				</div>
				<div class="col-lg-1 col-12 col-sm-12 col-md-1" style="padding: 0; background: #fff;">
					<div class="input-group w-100" style="padding-top: 8px; margin: 2px 0;">
					    <img src="{{asset('images/assets/Icon awesome-shopping-bag.png')}}" style="margin-left: auto;margin-right: auto; width: 16px;">
				    </div>
				</div>
			</div>
		</form> <!-- search-wrap .end// -->
		<!-- </div> col.// -->
	</div> 
</div>
	<!-- container.// -->
	@if(strlen($search) > 2)
		@if(count($searchResults) > 0)
			<div class="" style="position: absolute;z-index: 100;background: #fff; width: 100%;">
			    <div  class="container">
				    <hgroup class="mb20">
						<h3>Search Results</h3>
						<h4 class="lead"><strong class="text-danger">@if(isset($searchResults) and count($searchResults) > 0){{$searchResults->count()}}@endif</strong> results were found for keyword <strong class="text-danger">{{$search}}</strong></h4>							
					</hgroup>
				</div>
					<div class="container" style="max-height: 400px;
			    overflow-y: auto;">
				    <section class="col-xs-12 col-sm-6 col-md-12">
				    	@foreach($searchResults as $result)
				    	 	<a href="{{route('productSingle', $result->slug)}}">
								<article class="search-result row p-1">
									<div class="col-xs-12 col-sm-12 col-md-3">
										<a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{url($result->image_url)}}" alt="{{$result->name}}" style="width: 45%;" /></a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2">
										<p><small>VOLUME:</small></p>
										<ul class="meta-search">
{{-- 
											@foreach(\App\Product::where('id',$result->id)->first()->volume as $v)
												
												<li style="list-style: none"><i class="glyphicon glyphicon-calendar"></i> <span>{{$v}}</span></li>
											@endforeach --}}
										</ul>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
										<p><small>NAME:</small></p>
										<h6><a href="#" title="">{{$result->name}}</a></h6>
										<hr>
										<p>{{Illuminate\Support\Str::limit($result->description, 200)}}</p>						
						                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
									</div>
									<span class="clearfix borda"></span>
								</article>
							</a>
						@endforeach	
					</section>
				</div>
				<div class="close" style="background: black;width: 100%;height: 35px;position: absolute;top: 0;">
			
				</div>
			</div>
		@else
			<div class="" style="position: absolute;z-index: 100;background: #fff; width: 100%;">
			    <div  class="container">
				    <hgroup class="mb20">
						<h3>Search Results</h3>
						<h4 class="lead"><strong class="text-danger">@if(isset($searchResults) and count($searchResults) > 0){{$searchResults->count()}}@endif</strong> results were found for keyword <strong class="text-danger">{{$search}}</strong></h4>							
					</hgroup>
				</div>
				<div class="close" style="background: black;width: 100%;height: 35px;position: absolute;top: 0;">
					<div style="position: relative; background: #81233e; width: 30px; height: 30px border-radius: 50px;">
						
					</div>
				</div>
			</div>
		@endif
	@endif
	
</section> <!-- header-main .// -->
