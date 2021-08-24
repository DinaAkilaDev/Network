<div class="responsive-header">
    <div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
        <span class="mh-text">
				<a class="navbar-brand" href="{{ url('/') }}">
                          Network
                        </a>
			</span>

    </div>

    <nav id="menu" class="res-menu">
        <ul>
            <li><a href="{{route('home')}}" title="">Timeline</a></li>
            <li><a href="#" title="">My Profile</a></li>
        </ul>
    </nav>
</div><!-- responsive header -->
<div class="topbar stick">
    <div class="logo">
        <a class="navbar-brand" href="{{ url('/') }}">
            Network
        </a>
    </div>

    <div class="top-area">
        <ul class="main-menu">
            <li>
                <a href="{{route('home')}}" title="">Timeline</a>

            </li>
        </ul>

        <div class="user-img">
            @guest
                @if (Route::has('login'))
                    <a class="mtr-btn signin"  href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                @endif

                @if (Route::has('register'))

                        <a class="mtr-btn signup" href="{{ route('register') }}"><span>{{ __('Register') }}</span></a>

                    @endif
            @else


                {{ Auth::user()->name }}
            <img src="images/resources/admin.jpg" alt="">
            <span class="status f-online"></span>
            <div class="user-setting">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ti-power-off"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                @endguest
            </div>

        <span class="ti-menu main-menu" data-ripple=""></span>
    </div>
</div><!-- topbar -->
