<nav class="navbar navbar-expand-lg header-nav">
    <div class="navbar-header">
        <a id="mobile_btn" href="javascript:void(0);">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
        <a href="{{ route('web.index') }}" class="navbar-brand logo" style="height: 70px">
            <img src="{{ asset('arusha-logo.png') }}" class="img-fluid" alt="Logo">
        </a>
    </div>
    <div class="main-menu-wrapper">
        <div class="menu-header">
            <a href="{{ route('web.index') }}" class="menu-logo">
                <img src="{{ asset('arusha-logo.png') }}" class="img-fluid" alt="Logo">
            </a>
            <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
        </div>
        <ul class="navbar-nav main-nav my-2 my-lg-0">
            <li><a href="{{ route('web.index') }}"
                    class="{{ request()->routeIs('web.index') ? 'active' : '' }}">Home</a></li>
            <li><a href="#">Explore</a></li>
            <li class="has-submenu {{ request()->routeIs('web.vendor.*') ? 'active' : '' }}">
                <a href>Vendors <i class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="{{ route('web.vendor.registration.index') }}">Registration</a></li>
                    <li><a href="#">Verification</a></li>
                </ul>
            </li>
            <li><a href="{{route('web.listing.index')}}" class="{{ request()->routeIs('') ? 'active' : '' }}">Listing</a></li>
            <li><a href="{{ route('web.news.index') }}"
                    class="{{ request()->routeIs('web.news.*') ? 'active' : '' }}">News</a></li>
            <li><a href="{{ route('web.complaints.index') }}"
                    class="{{ request()->routeIs('web.complaints.*') ? 'active' : '' }}">Complaints</a>
            </li>
            <li><a href="{{ route('web.contact_us') }}"
                    class="{{ request()->routeIs('web.contact_us') ? 'active' : '' }}">Contacts</a>
            </li>
        </ul>
    </div>
    <div class="d-flex align-items-center block-e">
        @auth
            @if (!request()->routeIs('web.users.*'))
                <div class="cta-btn">
                    <a href="{{ route('web.users.dashboard.index') }}" class="btn">Dashboard</a>
                </div>
            @endif
        @else
            <div class="cta-btn">
                <a href="{{ route('login') }}" class="btn">Sign in</a>
                {{-- <a href="{{ route('register') }}" class="btn ms-1">Register</a> --}}
            </div>
        @endauth

    </div>
</nav>
