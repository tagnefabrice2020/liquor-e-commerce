@extends('layout')


@section('title', '')

@section('heading')
	{{__('index.indexHeader')}}
@endsection

@section('content')
<section class="section-content" id="select">
	<div class="container">
		<div class="row">
			<div class="container">
				<div class="row" style="max-width: 800px;margin: 0 auto;margin-top: 3%;border: 1px solid #81233e;border-radius: 2px;">
					<div class="col-md-4 pt-4 pb-4 col-sm-4">
						<div href="#" class="card card-product-grid product-image">
							<a href="#" class="img-wrap"> <img src="{{url($product->image_url)}}"> </a>
						</div>
						<h6>More by {{$product->name}}</h6>
						<div class="card-footer" style="padding: 5px 0 0 0; height: 6rem;">
							<div class="carousel-wrapper" id="product-carousel-wrapper">
								<div onclick="slideLeft(this.id)" style="width: 30px;height: 60px;position: relative;background: rgba(255,255,255,.5); z-index: 8888;" id="slideLeft">
									{{-- <i class="fa fa-angle-left"></i> --}}
								</div>
								<div class="product-carousel" id="product-carousel" style="overflow-x: scroll;
    white-space: nowrap;">
									@foreach($any as $a)
									<div style="display: inline-block; width: 60%;white-space: normal;">
										<a href="{{route('productSingle', $a->slug)}}">
											<img src="{{url($a->image_url)}}" class="product-thumbnail">
										</a>
									</div>
									@endforeach
									{{-- <img src="https://source.unsplash.com/200x200?beer" class="product-thumbnail">
									<img src="https://source.unsplash.com/200x200?football" class="product-thumbnail">
									<img src="https://source.unsplash.com/200x200?girl" class="product-thumbnail">
									<img src="https://source.unsplash.com/200x200?food" class="product-thumbnail">
									<img src="https://source.unsplash.com/200x200?pen" class="product-thumbnail">
									<img src="https://source.unsplash.com/200x200?paper" class="product-thumbnail"> --}}
								</div>
								<div onclick="slideRight(this.id)" style="width: 30px;height: 60px; margin-left: auto; position: relative; background: rgba(255,255,255,.5);" id="slideRight">
									{{-- <i class="fa fa-angle-right"></i> --}}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 pt-4 pb-4 col-sm-6">
						<div class="row">
							<div class="col">
								<h4 class="lead container brand-name">{{$product->brand['name']}} - {{$product->name}}</h4>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<form method="get" action="{{route('add_to_cart')}}">
									@csrf
									<aside class="col-md-12">
										<ul class="list-group mt-2">
											<?php 
												$i = 0;	
											?>
											@foreach($product->productVolumes as $volume)
											<?php 
												$value = $product->productVolumes[$i]->quantity;
												?>
												{{-- @foreach($cart as $key => $c) --}}
												<div class="row-cols-sm-2 list-group-item product-volumes" style="justify-content: space-between; font-size: 12px;">
													<div class="row w-100 mx-auto justify-content-between">
														<div class="col">
															<label class="custom-control custom-radio my-auto" style="margin-top: 6px !important;">
											                  <input type="radio" name="pv_id" value="{{$volume->id}}" value="normal" v-model="option" @click="getQuantity($event)" class="custom-control-input">
											                  <div class="custom-control-label"><label class="my-auto">{{$product->volumes[$i]['quantity']}}</label>	 </div>
											                </label>
															
															<?php $i++; ?>
														</div>
														<div class="col" style="text-align: end;">
															<label for="male" style="margin-top: 7px;">{{__('products.from')}} {{$volume->price}} FCFA</label>
														</div>
													</div>
			                					</div>
			                					{{-- @endforeach --}}
											@endforeach
										</ul>
									</aside> <!-- col.// -->
									<aside class="col-md-12 pt-4">
										<div class="row">
											<div class="col d-flex justify-content-between">
												<i class="fas fa-map-marker-alt p-2" style="font-size: 15px;color: #81233e;"></i> 
												<p class="p-1" style="color: #81233e;">This product is currently unavailable in your area. Shop more <a href="#" style="text-decoration: underline;">Brandy & Cognac</a></p>
											</div>
										</div>
									</aside>
											<aside class="col-md-12 pt-5">
										<div class="row">
											<div class="col-3">
												
												<select class="form-control" :disable="quantity <= 0" required name="qty" style="border-top-left-radius: 5px !important;border-top-right-radius: 5px !important;border-bottom-left-radius: 5px!important;border-bottom-right-radius: 5px!important;">
													<option v-for="n in quantity">@{{n}}</option>
												</select>
											</div>
											<div class="col-9 form-group">
												<button v-if="1" class="btn btn-add-to-cart" style="" formaction="{{route('buyDirectly')}}">{{__('products.buy')}}</button>
												<button class="btn btn-add-to-cart" style="border-radius: 5px;" v-if="1">{{__('products.addToCart')}}</button>
											</div>
										</div>
									</aside>
									@if(isset($c))
										{{$c}}
									@endif
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- <CartLoader></CartLoader> --}}
		<div class="row pb-2 pt-4 pb-4">
			<div class="container">
				<div class="row" style="max-width: 800px;margin: 0 auto;border: 1px solid #81233e;border-radius: 2px;">
					<div class="col-md-12 pt-4 pb-4">
						<div class="row pb-4">
							<div class="col">
								<p>YOU MAY ALSO LIKE</p>
							</div>
						</div>
						<div class="row">
							@foreach($products as $beer)
								<div class="col-md-3">
									<div href="#" class="card card-product-grid" style="border: 1px solid #ddd;">
										<a href="#" class="img-wrap"> <img src="{{url($beer->image_url)}}"> </a>
										<figcaption class="info-wrap">
											<a href="{{route('productSingle', ['slug' => $beer->slug])}}" class="title">{{Illuminate\Support\Str::limit($beer->name, 15)}}</a>
											<a href="{{route('productSingle', ['slug' => $beer->slug])}}" class="sub-title">{{$beer->category['name']}}</a>
									
											<div class="price mt-1">{{$beer->volume['quantity']}}</div> <!-- price-wrap.// -->
										</figcaption>
									</div>
								</div> 
							@endforeach
						</div> 
			        </div>
			    </div>
			</div>
		</div>

	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection

@section('css')
	<style type="text/css">
		
	</style>
@endsection

@section('scripts')
<script type="text/javascript">
		$('.owl-carousel').owlCarousel({
		    loop:false,
		    margin:10,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:false
		        },
		        1000:{
		            items:5,
		            nav:true,
		            loop:false
		        }
		    }
		})
	</script>
	<script type="text/javascript">

		function slideRight (id) {
			buttonR = document.getElementById(id)
			productCarousel = document.getElementById('product-carousel')
			// console.log(buttonR)
			buttonR.onclick = function () { 
				console.log(productCarousel)
				productCarousel.scrollRight += '100px'
				 }
		}


		function slideLeft (id) {
			productCarousel = document.getElementById('product-carousel')
			console.log(productCarousel)
			productCarousel.scrollRight -= 100
		}
		// var slideRight = document.getElementById('slideRight')
		// var slideLeft = document.getElementById('slideLeft')



		// slideRight.addEventListener('click', function (){
		// 	document.getElementById('product-carousel').scrollRight += 100
		// 	console.log('slide right clicked')
		// })
		// slideLeft.addEventListener('click', function (){
		// 	document.getElementById('product-carousel').scrollLeft -= 100
		// 	console.log('slide left clicked')
		// })
	</script>

	<script type="text/javascript">
	var app = new Vue({
    	el: '#select',
    	data: {
    		option: '',
    		quantity: '',

    	},

    	methods: {
    		async getQuantity (event) {
    			this.option = event.target.value
    			console.log(this.option)
    			var data = await axios
      				.get('//<?php echo Request::getHost(); ?>:8000/api/getQuantity/'+this.option)
      				.then(response => (this.quantity = response.data.quantity))
      				.catch(error => console.log(error))
    		}
    	},

    	created: function() {
    		// this.getQuantity();
    	}
	});


	</script>
@endsection