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
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="feather-grid"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.html">
                            <i class="fa-solid fa-user"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="my-listing.html">
                            <i class="feather-list"></i> <span>My Listing</span>
                        </a>
                    </li>
                    <li>
                        <a href="bookmarks.html">
                            <i class="fas fa-solid fa-heart"></i> <span>Bookmarks</span>
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
                        <a href="login.html">
                            <i class="fas fa-light fa-circle-arrow-left"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        
            {{ $slot }}
        </div>
    </div>

</x-web-layout>
