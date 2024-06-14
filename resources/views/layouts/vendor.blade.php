<x-web-layout>
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Dashboard</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-content">
        <div class="container">
            <div class>
                <ul class="dashborad-menus">
                    <li class="{{ request()->routeIs('web.users.dashboard.index') ? 'active' : '' }}">
                        <a href="{{ route('web.users.dashboard.index') }}">
                            <i class="feather-grid"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('web.users.profile.index') ? 'active' : '' }}">
                        <a href="{{ route('web.users.profile.index') }}">
                            <i class="fa-solid fa-user"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="
                        {{route('web.users.staff.index')}}">
                        <i class="fa-solid fa-user-tie"></i><span>Staffs</span>
                        </a>
                    </li>
                    <li>
                        <a href="my-listing.html">
                            <i class="feather-list"></i> <span>Services</span>
                        </a>
                    </li>

                    <li>
                        <a href="messages.html">
                            <i class="fa-solid fa-comment-dots"></i> <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="reviews.html">
                            <i class="fas fa-solid fa-star"></i> <span>Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            <i class="fas fa-light fa-circle-arrow-left"></i> <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            {{ $slot }}
        </div>
    </div>

</x-web-layout>
