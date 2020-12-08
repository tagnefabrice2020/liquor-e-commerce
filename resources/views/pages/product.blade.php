@extends('layout')

@section('title', '')

@section('heading')
	{{__('index.indexHeader')}}
@endsection

@section('content')

	<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop" style="background: url({{url('')}}); background-size: contain;
    overflow: hidden;">
   
<div class="custom-banner-container">
    <img src="{{url('images/banner.png')}}" style="background-repeat: no-repeat; max-width: 100%"> 
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content pt-2" style="background: #fefefe;" id="products">
<div class="container custom-product-container">

<div class="row">
    <aside class="col-md-4" id="side-bar-filter-section">
        @include('_partials.filters')
    </aside> <!-- col.// -->
<main class="col-md-8 p-4" style="box-shadow: 2px 5px 10px rgba(0,0,0,.2); background: #fff!important;" v-if="filter == false">
    {{-- <CartLoader></CartLoader> --}}
    @if(count($products) > 0)
        {{-- @foreach($products->chunk(4) as $productChunk) --}}
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-5 offset-md-1 col-lg-3 offset-lg-0 col-xl-3 col-sm-6 col-12 col-xs-12">
                        <figure class="card card-product-grid">
                            <div class="img-wrap"> 
                                {{-- <span class="badge badge-danger"> NEW </span> --}}
                                <img src="{{url($product->image_url)}}">
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="{{route('productSingle', ['slug' => $product->slug])}}" class="title">{{Illuminate\Support\Str::limit($product->name, 10)}}</a>
                                        <a href="#" class="sub-title">
                                            @if($product->category['name'] == 'beer')
                                              {{__('nav.beer')}}
                                            @elseif($product->category['name'] == 'wine')
                                              {{__('nav.wine')}}
                                            @elseif($product->category['name'] == 'spirits')
                                              {{__('nav.spirits')}}
                                            @elseif($product->category['name'] == 'gifts')
                                              {{__('nav.gifts')}}
                                            @elseif($product->category['name'] == 'more')
                                              {{__('nav.more')}}
                                            @endif
                                        </a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">{{$product->volume['quantity']}}</span>
                                        {{-- <del class="price-old">$1980</del> --}}
                                    </div> <!-- price-wrap.// -->
                                </div>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                @endforeach
            </div>
        {{-- @endforeach --}}
    @else
        <h6>{{__('products.noProductFound')}}</h6>
    @endif
    <div class="pagination-area">
        @if(count($products)>0)
            <h6 style="text-align: center;">{{$totalProducts}} @if($totalProducts > 1) {{__('products.products')}} @else {{__('products.product')}} @endif</h6>
            {{$products->links()}}
        @endif
    </div>

</main> <!-- col.// -->

<main class="col-md-8" v-if="loading" style="position: absolute; top: 0px">
    
</main>

<main class="col-md-8 p-4" style="box-shadow: 2px 5px 10px rgba(0,0,0,.2); background: #fff!important;" v-if="filter == true">
    
    <div class="row" v-if="filteredProducts.length > 0 && loading == false">
        <div class="col-md-5 offset-md-1 col-lg-3 offset-lg-0 col-xl-3 col-sm-12" v-for="product in filteredProducts">

            <figure class="card card-product-grid">
                <div class="img-wrap"> 
                    {{-- <span class="badge badge-danger"> NEW </span> --}}
                    <img v-bind:src="'/' + product.image_url" v-if="name == 'category' || name == 'sort'">
                    <img v-bind:src="'/' + product.product.image_url" v-if="name == 'volume'">
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                    <div class="fix-height">
                        <a v-bind:href="'/drinks/'+product.slug" class="title" v-if="name == 'sort' || name == 'category' ">@{{product.name.substr(0,10)}}...</a>
                        <a v-bind:href="'/drinks/'+product.product.slug" class="title" 
                        v-if="name == 'volume'">@{{product.product.name.substr(0,10)}}</a>
                            <a href="#" class="sub-title"></a>
                        <div class="price-wrap mt-2">
                            <span class="price" v-if="name == 'volume'">@{{product.volume.quantity}}</span>
                            <span class="price">@{{product.price}} FCFA</span>
                            {{-- <del class="price-old">$1980</del> --}}
                        </div> <!-- price-wrap.// -->
                    </div>
                </figcaption>
            </figure>
        </div> <!-- col.// -->
        <pagination :data="filteredProducts" v-if="filteredProducts.length > 0" @pagination-change-page="filterProducts"></pagination>
    </div>
    <div class="row" v-if="filteredProducts.length == 0 && loading == false && showEmptyFilterResult == true"
    style="position: absolute; top: 0px;">
        <h6>{{__('products.noProductFound')}}</h6>
    </div>
    <div class="row" v-if="loading" style="position: absolute; top: 50%; left: 50%">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
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
    <script type="text/javascript">
    
     var app = new Vue({
        el: '#products',
        data: {
            name: '',
            loading: false, // activate loader
            products: [],
            filter: false, //filter status if on or off
            value: '',
            filteredProducts: [],
            filterProductsEmpty: true,
            showEmptyFilterResult: false,
        },

        methods: {
            async filterProducts ( event) {
                // page = 1
                this.value = event.target.value
                this.name = event.target.name
                // console.log(name)
                this.loading = true
                this.filter = true
                var data = await axios
                    .get('http://localhost:8000/api/filter',
                        {params: { name: this.name, value: this.value }})
                    .then(response => (this.filteredProducts = response.data))
                    .catch(error => this.filteredProducts = [{title: "Erreur de Chargement "}])
                   // this.products = this.filteredProducts.data
                   // console.log(this.products)
                if(this.filteredProducts.length == '0') {
                    this.filterProductsEmpty = true
                    this.showEmptyFilterResult = true
                } else if (this.filterProducts.length>0) {
                    this.showEmptyFilterResult = false
                    this.filterProductsEmpty= false
                }
                this.loading = false
            }
        }
     })
    </script>
    <script type="text/javascript">
        function toggleMenuBugger (event) {
            
            var burgerMenu = document.getElementById("burger_menu")
            console.log(burgerMenu)
            var sideBar = document.getElementById("side-bar-filter-section")
            // // var mainContent =  document.getElementById("main-content")

            if (!burgerMenu.classList.contains("opened-menu")) {
                burgerMenu.classList.add("opened-menu")
                sideBar.classList.toggle('open-side-bar-filter-section')
            //     mainContent.classList.toggle("add-main-content-width")
            } else {
                burgerMenu.classList.remove('col-md-4')
                burgerMenu.classList.remove("opened-menu")
                sideBar.classList.toggle('open-side-bar-filter-section')
            //     mainContent.classList.toggle("add-main-content-width")
            }
        }

    </script>
@endsection

@section('css')
<style type="text/css">
  .lds-ripple {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #81233e;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 72px;
    height: 72px;
    opacity: 0;
  }
}




.side-filter-bar-section > .filter-group {
    width: 100%;
} 

.burger_menu_meat {
    width: 25px;
    height: 2.5px;
    background: white;
    border-radius: 4px;
    box-shadow: 0px 2px 5px rgba(0,0,0,.2);
    transition: all .5s ease-in-out;
    margin-left: auto;
    margin-right: auto;
}

.burger_menu_meat::before {
    transform: translateY(-6px);
}
.burger_menu_meat::after {
    transform: translateY(6px);
}
.burger_menu_meat::before, .burger_menu_meat::after {
    content: '';
    position: absolute;
    width: 25px;
    height: 2.5px;
    background: white;
    border-radius: 4px;
    box-shadow: 0px 2px 5px rgba(0,0,0,.2);
    transition: all .5s ease-in-out;
}
/*******
  burger menu animations
*/

.burger_menu.opened-menu > .burger_menu_meat {
    /*transform: translateX(-25px);*/
    background: transparent;
    box-shadow: none;
}

.opened-menu .burger_menu_meat::before {
    transform: translate(35px, -35px);
    transform: rotate(45deg);
}

.opened-menu .burger_menu_meat::after {
    transform: translate(35px, 35px);
    transform: rotate(-45deg);
}
</style>
@endsection