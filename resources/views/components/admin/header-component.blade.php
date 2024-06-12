<div class="header">
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="{{ asset('arusha-logo.png') }}" alt="Logo" width="30" height="30" />
        </a>
        <a href="index.html" class="logo-small">
            <img src="{{ asset('arusha-logo.png') }}" alt="Logo" width="30" height="30" />
        </a>
    </div>
    <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
        <i class="fas fa-align-left"></i>
    </a>
    <div class="header-split">
        <div class="page-headers">
            <div class="search-bar">
                <span><i class="fe fe-search"></i></span>
                <input type="text" placeholder="Search" class="form-control" />
            </div>
        </div>
        <ul class="nav user-menu">
            <li class="nav-item">
                <a href="{{ route('web.index') }}" class="viewsite"><i class="fe fe-globe me-2"></i>View Site</a>
            </li>
            <li class="nav-item dropdown has-arrow dropdown-heads flag-nav">
                <a class="nav-link" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                    <img src="{{ asset('admin/assets/img/flags/us1.png') }}" alt height="20" />
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('admin/assets/img/flags/us.png') }}" class="me-2" alt height="16" />
                        English
                    </a>
                </div>
            </li>
            <li class="nav-item has-arrow dropdown-heads">
                <a href="javascript:void(0);" class="toggle-switch">
                    <i class="fe fe-moon"></i>
                </a>
            </li>
            <li class="nav-item dropdown has-arrow dropdown-heads">
                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti">
                            Clear All
                        </a>
                    </div>
                    <div class="noti-content">

                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="notifications.html">View all Notifications</a>
                    </div>
                </div>
            </li>
            <li class="nav-item has-arrow dropdown-heads">
                <a href="javascript:void(0);" class="win-maximize">
                    <i class="fe fe-maximize"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="user-link nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ auth()->user()->profilePhoto }}" width="40"
                            alt="Admin" />
                        <span class="animate-circle"></span>
                    </span>
                    <span class="user-content">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-details">{{ auth()->user()->roles->first()->display_name }}</span>
                    </span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <div class="profilemenu">
                        <div class="user-detials">
                            <a href="#">
                                <span class="profile-image">
                                    <img src="{{ auth()->user()->profilePhoto }}" alt="img"
                                        class="profilesidebar" />
                                </span>
                                <span class="profile-content">
                                    <span>{{ auth()->user()->name }}</span>
                                    <span><span class="" data-cfemail="">{{ auth()->user()->email }}</span></span>
                                </span>
                            </a>
                        </div>
                        <div class="subscription-menu">
                            <ul>
                                <li>
                                    <a href="#">Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="subscription-logout">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Log
                                Out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
