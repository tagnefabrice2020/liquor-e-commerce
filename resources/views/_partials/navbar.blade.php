<nav class="navbar navbar-dark navbar-expand p-0 bg-reddish-gray">
    <div class="container custom-container">
        <div class="col-lg-1 col-1">
            <a href="{{route('/')}}" class="brand-wrap">
                <img class="logo" src="{{asset('images/logo/logo.png')}}">
            </a> <!-- brand-wrap.// -->
        </div>
        <ul class="navbar-nav d-none d-md-flex mr-auto">
            @foreach($liquour_categories as $liquour_category)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products', ['category' => $liquour_category->name])}}">
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
                        {{-- {{$liquour_category->name}} --}}
                    </a></li>
            @endforeach
            {{--   <li class="nav-item"><a class="nav-link" href="#">wine</a></li>
            <li class="nav-item"><a class="nav-link" href="#">wine</a></li>
            <li class="nav-item"><a class="nav-link" href="#">spirits</a></li>
            <li class="nav-item"><a class="nav-link" href="#">gifts</a></li>
            <li class="nav-item"><a class="nav-link" href="#">more</a></li> --}}
        </ul>
        @if(Auth::check())
                <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle user_account_name" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}} 
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="    width: -webkit-fill-available;
    border-radius: 0;">
                    @if(Auth::user()->hasRole(['superadministrator','administration']))
                        <a href="{{route('dashboard')}}" class="dropdown-item" target="_blank">Management</a>
                    @endif
                    {{-- <a class="dropdown-item" href="#"></a> --}}
                    {{-- <a class="dropdown-item" href="{{route('account_info')}}">My Account</a> --}}
                    <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </div>
            @else
                <ul class="navbar-nav right-side-nav">
                    <li class="nav-item">  
                      <p class="nav-link" data-close-others="true">
                        <a href="{{route('lang', 'en')}}">en</a>       
                        <a href="{{route('lang', 'fr')}}">fr</a>                       
                      </p>
                    </li>
                    <li  class="nav-item"><a href="{{route('login')}}" class="nav-link login-btn"> {{__('auth.login')}} </a></li>
                    <li class="nav-item">
                         <a href="{{route('register')}}" class="nav-link btn-primary sign-up-btn"> {{__('auth.sign up')}}</a>
                    </li>
                </ul> <!-- list-inline //  -->
            @endif
      </div> <!-- navbar-collapse .// -->
     <!-- container //  -->
</nav> <!-- header-top-light.// -->

