<x-web-layout>
    @push('styles')
        <style>
            .blog-img .img-container {
                position: relative;
                width: 100%;
                padding-bottom: 75%;
                overflow: hidden;
            }

            .blog-img .img-container img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }
        </style>
    @endpush
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Listings</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Listing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="list-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="listings-sidebar">
                        <div class="card">
                            <h4><img src="assets/img/details-icon.svg" alt="details-icon"> Filter</h4>
                            <form>
                                <div class="filter-content looking-input form-set">
                                    <input type="text" class="form-control" placeholder="What are you looking for?">
                                </div>
                                <div class="filter-content form-set">
                                    <select class="form-control select category-select">
                                        <option value>Choose Category</option>
                                        <option>Computer</option>
                                        <option>Electronics</option>
                                        <option>Car wash</option>
                                    </select>
                                </div>
                                <div class="filter-content looking-input form-set input-placeholder">
                                    <div class="group-img">
                                        <input type="text" class="form-control" placeholder="Where to look?">
                                        <i class="feather-map-pin"></i>
                                    </div>
                                </div>
                                <div class="filter-content form-set region">
                                    <select class="form-control select region-select">
                                        <option value>Region</option>
                                        <option>Canada</option>
                                        <option>USA</option>
                                        <option>india</option>
                                    </select>
                                </div>
                                <div class="filter-content form-set amenities">
                                    <h4> Amenities</h4>
                                    <ul>
                                        <li>
                                            <label class="custom_check">
                                                <input type="checkbox" name="wireless-internet">
                                                <span class="checkmark"></span> Wireless Internet
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom_check">
                                                <input type="checkbox" name="accept-credit-card">
                                                <span class="checkmark"></span> Accepts Credit Cards
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom_check">
                                                <input type="checkbox" name="Coupouns">
                                                <span class="checkmark"></span> Coupouns
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom_check">
                                                <input type="checkbox" name="parking-street">
                                                <span class="checkmark"></span> Parking Street
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom_check">
                                                <input type="checkbox" name="bike-parking">
                                                <span class="checkmark"></span> Bike Parking
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom_check">
                                                <input type="checkbox" name="Smoking-Allowed">
                                                <span class="checkmark"></span> Smoking Allowed
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="filter-content form-set amenities radius">
                                    <div class="slidecontainer">
                                        <div class="slider-info">
                                            <h4> Radius</h4>
                                            <div class="demo"><span>50</span> Radius</div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="filter-range">
                                            <input type="text" class="input-range">
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-content amenities mb-0">
                                    <h4> Price Range</h4>
                                    <div class="form-set mb-0">
                                        <input type="text" class="form-control" placeholder="Min">
                                        <input type="text" class="form-control me-0" placeholder="Max">
                                    </div>
                                    <div class="search-btn">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"
                                                aria-hidden="true"></i> Search</button>
                                        <button class="btn btn-reset mb-0" type="submit"> <i
                                                class="fas fa-light fa-arrow-rotate-right"></i>Reset
                                            Filters</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row sorting-div">
                        <div class="col-lg-4 col-md-4 col-sm-5 col-12 align-items-center d-flex">
                            <div class="count-search">
                                <p>Showing <span>1-8</span> of 10 Results</p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-7 col-12 align-items-center">
                            <div class="sortbyset">
                                <span class="sortbytitle">Sort by</span>
                                <div class="sorting-select">
                                    <select class="form-control select">
                                        <option>Default</option>
                                        <option>Price Low to High</option>
                                        <option>Price High to Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid-listview">
                                <ul>
                                    <li>
                                        <a href="listing-list-sidebar.html">
                                            <i class="feather-list"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.listings.index') }}" class="active">
                                            <i class="feather-grid"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid-view listgrid-sidebar">
                        <div class="row">

                            @foreach ($services as $item)
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="blog-widget">
                                            <div class="blog-img">
                                                <a href="{{ route('web.listings.show', ['listing' => $item->slug]) }}">
                                                    <div class="img-container">
                                                        <img src="{{ $item->featured_image }}"
                                                            class="img-fluid list-img" alt="blog-img">
                                                    </div>
                                                </a>
                                                <div class="fav-item">
                                                    <span class="featured-text">Featured</span>
                                                    <a href="javascript:void(0)" class="fav-icon">
                                                        <i class="feather-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="bloglist-content">
                                                <div class="card-body">
                                                    <div class="blogfeaturelink">
                                                        <div class="grid-author">
                                                            <img src="{{ $item->user->profile_photo_path }}"
                                                                alt="author">
                                                        </div>
                                                        <div class="blog-features">
                                                            <a href="javascript:void(0)"><span> <i
                                                                        class="fa-regular fa-list-alt"></i>{{ $item->category->name }}</span></a>
                                                        </div>
                                                        <div class="blog-author text-end">
                                                            <span> <i class="feather-eye"></i>{{ $item->views_count }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <h6><a
                                                            href="{{ route('web.listings.show', ['listing' => $item->slug]) }}">{{ $item->title }}</a>
                                                    </h6>
                                                    <div class="blog-location-details">
                                                        <div class="location-info">
                                                            <i class="feather-map-pin"></i>{{ $item->address }}
                                                        </div>
                                                        <div class="location-info">
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                            {{ $item->created_at->format('d M, Y') }}
                                                        </div>
                                                    </div>
                                                    <div class="amount-details">
                                                        <div class="amount">
                                                            @if ($item->min_price)
                                                                <span class="validrate">$350</span>
                                                                {{-- <span>$450</span> --}}
                                                            @endif

                                                        </div>
                                                        <div class="ratings">
                                                            <span>{{ $item->rate }}</span>
                                                            ({{ $item->review_count }})
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <div class="blog-pagination">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item previtem">
                                    <a class="page-link" href="#"><i class="fas fa-regular fa-arrow-left"></i>
                                        Prev</a>
                                </li>
                                <li class="justify-content-center pagination-center">
                                    <div class="pagelink">
                                        <ul>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2 <span
                                                        class="visually-hidden">(current)</span></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="page-item nextlink">
                                    <a class="page-link" href="#">Next <i
                                            class="fas fa-regular fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-web-layout>
