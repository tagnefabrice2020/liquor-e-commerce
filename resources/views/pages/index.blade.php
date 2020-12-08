@extends('layout')


@section('heading')
	{{__('index.indexHeader')}}
@endsection

@section('content')
@include('_partials.carousel')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
	<div class="container custom-container">
		<header class="section-heading">
			{{-- <a href="#" class="btn btn-outline-primary float-right see-all-btn">{{__('index.seeAll')}}</a> --}}
			<h3 class="section-title" style="text-transform: uppercase; font-weight: 100;
		    font-size: .8rem;">{{__('index.topDrinksForYou')}}</h3>
			<div style="border-bottom: 2px solid #82133e; width: 15%;"></div>
			<div style="border-bottom: 1px solid silver; width: 100%; opacity: .1;"></div>
		</header><!-- sect-heading -->
		<div class="basic-carousel owl-carousel owl-theme">
			@foreach($products as $product)
				<div class="col-md-12">
					<div href="#" class="card card-product-grid" style="border: 1px solid #ddd;">
						<a href="{{route('productSingle', ['slug' => $product->slug])}}" class="img-wrap"> <img src="{{url($product->image_url)}}"> </a>
						<figcaption class="info-wrap">
							<a href="{{route('productSingle', ['slug' => $product->slug])}}" class="title">{{Illuminate\Support\Str::limit($product->name, 15)}}</a>
							<a href="#" class="sub-title">{{$product->category['name']}}</a>
					
							<div class="price mt-1">{{$product->volume['quantity']}}</div> <!-- price-wrap.// -->
						</figcaption>
					</div>
				</div> 
			@endforeach
		</div>
	</div> <!-- container custom-container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content pb-2">
	<div style="padding: 10px; border: 2px solid #636365d9" class="container">
		<div class="container custom-container">
			<header class="section-heading">
				<a href="#" class="btn btn-outline-primary float-right see-all-btn">{{__('index.seeAll')}}</a>
				<h3 class="section-title" style="text-transform: uppercase; font-weight: 100;
			    font-size: .8rem;">{{__('index.bestSellingBeer')}}</h3>
				<div style="border-bottom: 2px solid #82133e; width: 15%;"></div>
				<div style="border-bottom: 1px solid silver; width: 100%; opacity: .1;"></div>
			</header><!-- sect-heading -->

			<div class="basic-carousel owl-carousel owl-theme">
				@foreach($bestSellingBeers as $beer)
					<div class="col-md-12">
						<div href="#" class="card card-product-grid" style="border: 1px solid #ddd;">
							<a href="#" class="img-wrap"> <img src="{{url($beer->image_url)}}"> </a>
							<figcaption class="info-wrap">
								<a href="{{route('productSingle', ['slug' => $beer->slug])}}" class="title">{{Illuminate\Support\Str::limit($beer->name, 15)}}</a>
								<a href="{{route('productSingle', ['slug' => $beer->slug])}}" class="sub-title">{{$beer->category['name']}}</a>
						
								<div class="price mt-1">{{$beer->volume['quantity']}}</div> <!-- price-wrap.// -->
							</figcaption>
						</div>
					</div> <!-- col.// -->
				@endforeach
			</div> <!-- row.// -->
		</div> <!-- container custom-container .//  -->

	<div class="container custom-container">
		<div class="row">
			<div class="col-md-3 col-6">
				<figure class="box item-logo" style="padding: 0;">
					<a href="#"><img src="{{asset('images/shopping-cart-footer-images/beer-a-pint-cup-alcohol-65210.jpeg')}}"></a>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-3  col-6">
				<figure class="box item-logo" style="padding: 0;">
					<a href="#"><img src="{{asset('images/shopping-cart-footer-images/beer-machine-alcohol-brewery-159291.jpeg')}}"></a>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-3  col-6">
				<figure class="box item-logo" style="padding: 0;">
					<a href="#"><img src="{{asset('images/shopping-cart-footer-images/pexels-photo-1089932.jpeg')}}"></a>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-3 col-6">
				<figure class="box item-logo" style="padding: 0;">
					<a href="#"><img src="{{asset('images/shopping-cart-footer-images/pexels-photo-1283219.jpeg')}}"></a>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div><!-- container custom-container // -->
	</div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-bottom-sm pb-2">
	<div style="padding: 10px; border: 2px solid #636365d9" class="container">
		<div class="container custom-container">
			<header class="section-heading">
				<a href="#" class="btn btn-outline-primary float-right see-all-btn">{{__('index.seeAll')}}</a>
				<h3 class="section-title" style="text-transform: uppercase; font-weight: 100;
			    font-size: .8rem;">{{__('index.bestSellingWines')}}</h3>
				<div style="border-bottom: 2px solid #82133e; width: 15%;"></div>
				<div style="border-bottom: 1px solid silver; width: 100%; opacity: .1;"></div>
			</header><!-- sect-heading -->
			<div class="basic-carousel owl-carousel owl-theme">
				@foreach($wines as $wine)
					<div class="col-md-12">
						<div href="#" class="card card-product-grid" style="border: 1px solid #ddd;">
							<a href="{{route('productSingle', ['slug' => $wine->slug])}}" class="img-wrap"> <img src="{{url($wine->image_url)}}"> </a>
							<figcaption class="info-wrap">
								<a href="{{route('productSingle', ['slug' => $wine->slug])}}" class="title">{{Illuminate\Support\Str::limit($wine->name, 15)}}</a>
								<a href="#" class="sub-title">{{$wine->category['name']}}</a>
						
								<div class="price mt-1">{{$wine->volume['quantity']}}</div> <!-- price-wrap.// -->
							</figcaption>
						</div>
					</div> <!-- col.// -->
				@endforeach
			</div> <!-- row.// -->
		</div> <!-- container custom-container .//  -->
		<div class="container custom-container">
			<div class="row">
				<div class="col-md-3 col-6">
					<figure class="box item-logo" style="padding: 0;">
						<a href="#"><img src="{{asset('images/shopping-cart-footer-images/pexels-photo-301692.jpeg')}}"></a>
					</figure> <!-- item-logo.// -->
				</div> <!-- col.// -->
				<div class="col-md-3  col-6">
					<figure class="box item-logo" style="padding: 0;">
						<a href="#"><img src="{{asset('images/shopping-cart-footer-images/pexels-photo-372959.jpeg')}}"></a>
					</figure> <!-- item-logo.// -->
				</div> <!-- col.// -->
				<div class="col-md-3  col-6">
					<figure class="box item-logo" style="padding: 0;">
						<a href="#"><img src="{{asset('images/shopping-cart-footer-images/pexels-photo-1089932.jpeg')}}"></a>
					</figure> <!-- item-logo.// -->
				</div> <!-- col.// -->
				<div class="col-md-3 col-6">
					<figure class="box item-logo" style="padding: 0;">
						<a href="#"><img src="{{asset('images/shopping-cart-footer-images/pexels-photo-1283219.jpeg')}}"></a>
					</figure> <!-- item-logo.// -->
				</div> <!-- col.// -->
			</div> <!-- row.// -->
		</div><!-- container custom-container // -->
	</div>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
@section('scripts')
	<script type="text/javascript">
		
	</script>

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
@endsection

@section('css')
	<style type="text/css">
		@media (max-width: 768px) {
		    .carousel-inner .carousel-item > div {
		        display: none;
		    }
		    .carousel-inner .carousel-item > div:first-child {
		        display: block;
		    }
		}
		.carousel-inner .carousel-item.active,
		.carousel-inner .carousel-item-next,
		.carousel-inner .carousel-item-prev {
		    display: flex;
		}
		/* display 3 */
		@media (min-width: 768px) {
		    
		    .carousel-inner .carousel-item-right.active,
		    .carousel-inner .carousel-item-next {
		      transform: translateX(33.333%);
		    }
		    
		    .carousel-inner .carousel-item-left.active, 
		    .carousel-inner .carousel-item-prev {
		      transform: translateX(-33.333%);
		    }
		}
		.carousel-inner .carousel-item-right,
		.carousel-inner .carousel-item-left{ 
		  transform: translateX(0);
		}
	</style>
@endsection