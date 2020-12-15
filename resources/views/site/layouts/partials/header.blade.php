<header class="header-area" id="header-area">
    <div class="dope-nav-container breakpoint-off">
        <div class="container">
            <div class="row">
                <!-- dope Menu -->
                <nav class="dope-navbar justify-content-between" id="dopeNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ route('home') }}">
                        Quemny
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="dope-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                    </div>

                    <!-- Menu -->
                    <div class="dope-menu">

                        <!-- close btn -->
                        <div class="dopecloseIcon">
                            <div class="cross-wrap">
                                <span class="top"></span>
                                <span class="bottom"></span>
                            </div>
                        </div>


                        <!-- Nav Start -->
                        <div class="dopenav">
                            <ul id="nav">
                                <li>
                                    <form class="form-inline my-2 my-lg-0">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                                <li>
                                    <a href="#about-section">About</a>
                                </li>
                                <li>
                                    <a href="#contact-section">Contact-us</a>
                                </li>
                                <li>
                                    <a href="#about-section">Setting</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
