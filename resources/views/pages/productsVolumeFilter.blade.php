@extends('layout')

@section('title', '')

@section('heading')
	{{__('index.indexHeader')}}
@endsection

@section('content')
	<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg" style="background: url({{url('')}}); background-size: contain;
    background-repeat: no-repeat;">
<div class="container">
    
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
    <aside class="col-md-3">
        @include('_partials.filters')
    </aside> <!-- col.// -->
<main class="col-md-9">
    @if(count($products) > 0)
        @foreach($products->chunk(4) as $productChunk)
            <div class="row">
                @foreach($productChunk as $product)
                    <div class="col-md-3">
                        <figure class="card card-product-grid">
                            <div class="img-wrap"> 
                                {{-- <span class="badge badge-danger"> NEW </span> --}}
                                <img src="{{url($product->product->image_url)}}">
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="{{route('productSingle', $product->product->slug)}}" class="title">{{Illuminate\Support\Str::limit($product->product->name, 20)}}</a>
                                        <a href="#" class="sub-title">{{$product->product->category['name']}}</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">{{$product->product->volume['quantity']}} </span>
                                        {{-- <del class="price-old">$1980</del> --}}
                                    </div> <!-- price-wrap.// -->
                                </div>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                @endforeach
            </div>
        @endforeach
    @else
        <h6>No liquor found for this filter</h6>
    @endif

<nav class="mt-4" aria-label="Page navigation sample">
  {{-- {{$products->links()}} --}}
</nav>

    </main> <!-- col.// -->

</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
	
@section('scripts')
@endsection