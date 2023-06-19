<header id="header-part">
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                @if (Route::has('login'))
                                    <div class="hidden top-0 right-0 px-6 sm:block d-flex">
                                        @auth
                                            <li class="nav-item btn-group dropdown show">
                                                <a type="button" class="nav-link dropdown-toggle" href="#"
                                                    id="navbarDropdown" role="" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-lg-end sub-menu">
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Log out </a>
                                                    </li>

                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                                                <a class="nav-link text-success-custom" href="{{ url('login') }}">{{ __('text.login') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-success-custom" href="#">|</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item {{ request()->is('user-type') ? 'active' : '' }}">
                                                    <a href="{{ route('register') }}"
                                                        class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('text.reg') }}</a>
                                                </li>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <small>Language</small>
                            <select class="form-control lang-change">
                                <option value="en" {{ session()->get('lang_code') == 'en' ? 'selected' : '' }}>
                                    English</option>
                                <option value="bn" {{ session()->get('lang_code') == 'bn' ? 'selected' : '' }}>
                                    Bengali</option>
                            </select>
                        </div>
                    </nav> <!-- nav -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

</header>
