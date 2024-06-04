<header class="header ">
    <div class="container">
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
                    <x-web.header-list-component />
                </ul>
            </div>
            <div class="d-flex align-items-center block-e">
                <div class="cta-btn">
                    <a href="{{ route('login') }}" class="btn">sign in </a>
                    {{-- <a href="{{ route('register') }}" class="btn ms-1"> register</a> --}}
                </div>
            </div>
        </nav>
    </div>
</header>
