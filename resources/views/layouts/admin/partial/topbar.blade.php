<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                {{-- <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/image/favicon.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/image/favicon.png') }}" alt="" height="50">
                    </span>
                </a> --}}
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

            <div class="d-flex ps-5">
                <div class="col-md-12">
                    <small>Language</small>
                    <select class="form-control lang-change">
                        <option value="en" {{ session()->get('lang_code') == 'en' ? 'selected' : '' }}>
                            English</option>
                        <option value="bn" {{ session()->get('lang_code') == 'bn' ? 'selected' : '' }}>
                            Bengali</option>
                    </select>
                </div>
              <div class="ps-5 d-flex align-items-center " >  {{ Auth::user()->name }}</div>
            </div>

        </div>


    </div>
</header>
{{-- js cdn --}}
