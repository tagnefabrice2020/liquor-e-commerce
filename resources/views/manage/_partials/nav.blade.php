<nav class="sb-topnav navbar navbar-expand" style="border-bottom: 1px solid #82133e; background: #fff;" id="nav-section">
             <div class="col-md-2 col-2">
            <a href="{{route('/', app()->getLocale())}}" class="brand-wrap">
                <img class="logo" src="{{asset('images/logo/logo.png')}}" style="width: 25%; margin-left: 50%; transform: translate(-50%);">
            </a> <!-- brand-wrap.// -->
        </div>
        <div style="display: flex; justify-content: space-between;width: -webkit-fill-available;">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars" style="color: #82133e;
    font-size: 20px;"></i></button>
            <!-- Navbar Search-->
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="notifyDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #82133e; font-family: 'GT America'"><i class="fas fa-bell"></i><span class="badge badge-danger">@{{notifications.length}}</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifyDropdown" style="max-height: 250px; overflow-y: scroll;">
                        <span v-if="notifications.length > 0"><a v-for="n in notifications" v-bind:href="'/manage/viewOrder/'+n.data.data.id+'/'+n.id" class="dropdown-item">nouvelle commande de @{{n.data.data.first_name}}</a></span>
                        <a v-if="notifications.length == 0" href="#" class="dropdown-item">aucune notification</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #82133e; font-family: 'GT America'"><i class="fas fa-user fa-fw"></i>@if(Auth::check()) {{Auth::user()->last_name}} @endif</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        {{-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
 --}}                    <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </div>
                </li>
            </ul>
        </div>
        </nav>