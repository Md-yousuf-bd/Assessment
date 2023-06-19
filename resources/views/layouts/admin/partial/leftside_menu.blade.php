<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    {{-- href="{{ route('admin.dashboard') }}" --}}
                    <a class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-danger float-end">04</span>
                        <span key="t-dashboards">{{ __('text.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- {{ route('products.index') }} --}}
                        <li><a href="{{ route('category.create') }}" key="t-horizontal">Create</a></li>

                        <li><a href="{{ route('category.index') }}" key="t-horizontal">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">Sub Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- {{ route('products.index') }} --}}
                        <li><a href="{{ route('sub.create') }}" key="t-horizontal">Create</a></li>

                        <li><a href="{{ route('sub.index') }}" key="t-horizontal">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">Sub Sub Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- {{ route('products.index') }} --}}
                        <li><a href="{{ route('subsub.create') }}" key="t-horizontal">Create</a></li>

                        <li><a href="{{ route('subsub.index') }}" key="t-horizontal">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-solid fa-copy text-info"></i>
                        <span key="t-dashboards">Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- {{ route('products.index') }} --}}
                        <li><a href="{{ route('product.create') }}" key="t-horizontal">Create</a></li>

                        <li><a href="{{ route('product.index') }}" key="t-horizontal">View</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End --
