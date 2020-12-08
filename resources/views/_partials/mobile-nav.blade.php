<nav class="navbar navbar-main navbar-expand-lg navbar-light" style="background: #82133E;">
    <div class="container custom-container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse mobile-nav" id="main_nav" style="">
        <ul class="navbar-nav" style="text-transform: uppercase; color: #fff;">
          @foreach($liquour_categories as $liquour_category)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('products', ['category' => $liquour_category->name])}}">
                    {{-- {{$liquour_category->name}} --}}
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
                  </a></li>
            @endforeach
        </ul>
    </div> <!-- collapse .// -->
    <div class="navbar-nav right-side-nav">
      <div class="burger_menu" id="burger_menu" onclick="toggleMenuBugger(event)">  
          <div class="burger_menu_meat"></div>  
      </div>
    </div>
      <div class="container container-content-p" id="" style="width: fit-content;">
        <p class="" style="text-transform: uppercase;width: fit-content;
      margin: auto; color: #fff; font-size: 11px;">@yield('heading')</p>
      </div> <!-- collapse .// -->
    </div> <!-- container .// -->
  
  </nav>
