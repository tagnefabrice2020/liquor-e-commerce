<section class="header-main">
	<div class="search-container">
	<div class="row align-items-center search-content-section">
		<form action="#" class="search" style="width: 100%;">
			<div class="row">
				<div class="col-lg-8 col-12 col-sm-12 col-md-6" style="padding: 0;">
					
					<div class="input-group w-100">
						<div class="input-group-prepend" style="width: 0px !important;">
						    <span class="" id="basic-addon1"><i class="fa fa-search ml-5"></i></span>
						  </div>
						<!-- <span class="fa fa-search form-control-feedback"></span> -->
					    <input type="text" class="form-control search-input" placeholder="{{__('index.searchPlaceholder')}}? " style="" v-model="search" v-on:keyup="instantSearch($event)"  @focus="searchResultsVisible = true">
				    </div>
				</div>
				<div class="col-lg-3 col-9 col-sm-9 col-xs-9 col-md-4" style="padding: 0; position: relative;">
					<div class="input-group w-100">
						<div class="address-input-group">
							<img src="{{asset('images/assets/Icon ionic-md-arrow-dropdown-circle.png')}}">
						</div>
						<select id="address_option" v-on:change="instantSearch($event)" class="form-control address-input" style="border-top-right-radius: 0px; border-left-color: #fff; border-bottom-right-radius: 0px; border-top-color: #fff;background: transparent; border-right-color: #82133e;
    border-bottom-color: #fff; ">
    						<option selected disabled>{{__('index.addressOption')}}</option>
			        		
    						@foreach($address_locations as $address)
    							<option value="{{$address->id}}">{{$address->name}}</option>
    						@endforeach
			      		</select>
					    <!-- <input type="text" class="form-control" placeholder="Enter a Delivery Address" style=" "> -->
				    </div>
				</div>
				<div class="col-lg-1 col-3 col-sm-3 col-xs-3 col-md-2" style="padding: 0; background: #fff;">
					<div class="input-group w-100 h-100">
						<a href="{{route('cartPage')}}" class="cart-link">
							@if(count(Cart::content()) > 0)<span class="badge custom-badge">{{Cart::content()->count()}}</span>@endif
					    	<img src="{{asset('images/assets/Icon awesome-shopping-bag.png')}}" class="image-cart">
						</a>
				    </div>
				</div>
			</div>
		</form> <!-- search-wrap .end// -->
		<!-- </div> col.// -->
	</div> 
</div>
	<!-- container.// -->





		<!-- container.// -->
	
	<div class="" style="position: absolute;z-index: 10000000;background: #fff; width: 100%;" v-if="((search.length > 2 && address != '') && searchResultsVisible)">
	    <div  class="container">
		    <hgroup class="mb20">
				<h3>Search Results</h3>
				<h5 class="lead"><strong class="text-danger">@{{searchResults.length}}</strong> <span v-if="searchResults.length > 1">results</span> <span v-if="searchResults.length <= 1">result</span> were found for keyword <strong class="text-danger">@{{search}}</strong></h5>							
			</hgroup>
		</div>
			<div class="container" style="max-height: 400px;
	    overflow-y: auto;">
		    <section class="col-xs-12 col-sm-6 col-md-12">
		    	 	<div href="" v-for="(product, index) in searchResults" :key="index">
						<article class="search-result row p-1">
							<div class="col-xs-12 col-sm-12 col-md-3">
								<a href="#" title="Lorem ipsum" class="thumbnail"><img v-bind:src="'/' + product.image_url" alt="" style="width: 45%;" /></a>
							</div>
			
							<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
								<h6><a v-bind:href="lang+'/drinks/'+product.slug" title="">@{{product.name}}</a></h6>
								<hr>
								<p v-if="product.description.length > 20">@{{product.description.substr(0, 200)}} ...</p>
								<p v-if="product.description.length < 20">@{{product.description}}</p>						
				                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
							</div>
							<span class="clearfix borda"></span>
						</article>
					</div>
					
			</section>
		</div>
		<div class="close" style="background: black;width: 100%;height: 35px;position: absolute;top: 0;">
			<p style="margin-left: auto;
    width: 30px;
    color: red;
    margin-top: 5px;" v-on:click="close($event)"><i class="fas fa-times"></i></p>
		</div>
	</div>


</section> <!-- header-main .// -->
