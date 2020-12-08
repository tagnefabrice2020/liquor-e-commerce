
<div class="card side-filter-bar-section" >
    <article class="filter-group pl-2 pr-2">
        <header class="card-header" style="width: 75%; margin-left: 20px; background: #fefefe;">
            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="false" class="collapsed">
              <p style="float: right; text-transform: uppercase;color: rgba(0,0,0,.8);"><small>{{__('products.hide')}}</small></p>
                {{-- <i class="icon-control fa fa-chevron-down"></i> --}}
                <h6 class="title" style="text-transform: uppercase;color: #000;">{{__('products.sort')}}</h6>
            </a>
        </header>
        <div class="filter-content collapse show in" id="collapse_1" style="width: 75%;margin-left: 20px; overflow: hidden;">
            <div class="card-body">
              
                  <input type="hidden" name="c_id" value="{{$c_id}}">
                {{-- <label class="custom-control custom-radio">
                  <input type="radio" @change="filterProducts($event)" v-model="value" name="sort" value="normal" checked="" class="custom-control-input">
                  <div class="custom-control-label">Relevance</div>
                </label> --}}

                <label class="custom-control custom-radio">
                  <input type="radio" @change="filterProducts($event)" v-model="value" name="sort" value="aToz" 
                    @if(isset($sort_type))
                      @if($sort_type == 'aToz')
                        checked 
                      @endif
                    @endif 
                    class="custom-control-input">
                  <div class="custom-control-label">{{__('products.atoz')}}</div>
                </label>

                <label class="custom-control custom-radio">
                  <input type="radio" @change="filterProducts($event)" v-model="value" name="sort" value="asc_price"
                    @if(isset($sort_type))
                      @if($sort_type == 'asc_price')
                        checked 
                      @endif
                    @endif
                   class="custom-control-input">
                  <div class="custom-control-label">{{__('products.priceAsc')}}</div>
                </label>

                <label class="custom-control custom-radio">
                  <input type="radio" @change="filterProducts($event)" v-model="value" name="sort" value="desc_price"
                    @if(isset($sort_type))
                      @if($sort_type == 'desc_price')
                        checked 
                      @endif
                    @endif
                   class="custom-control-input">
                  <div class="custom-control-label">{{__('products.priceDesc')}}</div>
                </label>            
            </div><!-- card-body.// -->
        </div>       
            
    </article> <!-- filter-group  .// -->
   {{--  <article class="filter-group">
        <header class="card-header">
            <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" class="collapsed">
                <p style="float: right; text-transform: uppercase;color: #81233e;"><small>{{__('products.hide')}}</small></p>
                <h6 class="title" style="text-transform: uppercase;color: #81233e;">Company </h6>
            </a>
        </header>
        <div class="filter-content collapse show in" id="collapse_2" style="">
            <div class="card-body">
               <form method="get" action="">
                @csrf
                <input type="hidden" name="c_id" value="{{$c_id}}">
                 <label class="custom-control custom-radio">
                  <input type="radio" name="sort" value="normal" checked="" class="custom-control-input">
                  <div class="custom-control-label">Relevance</div>
                </label>

                <label class="custom-control custom-radio">
                  <input type="radio" name="sort" value="aToz" class="custom-control-input">
                  <div class="custom-control-label">A to Z </div>
                </label>

                <label class="custom-control custom-radio">
                  <input type="radio" name="sort" value="asc_price" class="custom-control-input">
                  <div class="custom-control-label">Price: Low to High</div>
                </label>

                <label class="custom-control custom-radio">
                  <input type="radio" name="sort" value="desc_price" class="custom-control-input">
                  <div class="custom-control-label">Price: High to Low</div>
                </label>
                <button class="btn btn-block btn-sm btn-info" style="background: #33373e; border-color: #33373e; border-radius: 0px;font-weight:100;">Apply</button>
              </form>
            </div>
              
            </div> <!-- card-body.// -->
        
    </article>  --}}
    <!-- filter-group .// -->
    
    <article class="filter-group" style="width: 75%; margin-left: 20px; color: ">
        <header class="card-header" style="background: #fefefe">
            <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" class="collapsed">
                <p style="float: right; text-transform: uppercase;color: rgba(0,0,0,.8);"><small>{{__('products.hide')}}</small></p>
                <h6 class="title" style="text-transform: uppercase;color: #000;">{{__('products.volume')}} </h6>
            </a>
        </header>
        <div class="filter-content collapse show in" id="collapse_4" style="overflow: hidden;">
            <div class="card-body">
              {{-- <input type="hidden" name="c_id" name="{{$c_id}}"> --}}
                @foreach($liquour_volumes as $liquour_volume)
                  <label class="custom-control custom-radio">
                  <input type="radio" name="volume" v-model="value" @change="filterProducts($event)" 
                    value="{{$liquour_volume->id}}" class="custom-control-input">
                  <div class="custom-control-label">{{$liquour_volume->quantity}}</div>
                </label>
                @endforeach              
        </div><!-- card-body.// -->
      </div>
    </article> <!-- filter-group .// -->
    <article class="filter-group" style="width: 75%; margin-left: 20px;">
        <header class="card-header" style="background: #fefefe">
            <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="">
                <p style="float: right; text-transform: uppercase;color: rgba(0,0,0,.8);"><small>{{__('products.hide')}}</small></p>
                <h6 class="title" style="text-transform: uppercase;color: #000;">{{__('products.category')}} </h6>
            </a>
        </header>
        <div class="filter-content collapse show in" id="collapse_5" style="overflow: hidden;">
            <div class="card-body">
                @foreach($liquour_categories as $liquour_category)
                  <label class="custom-control custom-radio">
                  <input type="radio" name="category" v-model="value" @change="filterProducts($event)" 
                      value="{{$liquour_category->name}}" class="custom-control-input">
                  <div class="custom-control-label"> 
                    @if($liquour_category->name == 'beer')
                      {{__('nav.beer')}}
                    @elseif($liquour_category->name == 'wine')
                      {{__('nav.wine')}}
                    @elseif($liquour_category->name == 'spirits')
                      {{__('nav.spirits')}}
                    @elseif($liquour_category->name == 'gifts')
                      {{__('nav.gifts')}}
                    @elseif($liquour_category->name == 'more')
                      {{__('nav.more')}}
                    @endif
                  </div>
                </label>
                @endforeach            
            </div><!-- card-body.// -->
        </div>
    </article> <!-- filter-group .// -->
</div><!-- card.// -->


