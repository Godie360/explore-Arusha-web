<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('arusha-logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>


<section class="banner-section banner-five">
    <div class="container">
        <div class="home-banner">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto">
                    <div class="section-search aos" data-aos="fade-up">
                        <h1>EXPLORE ARUSHA CITY</h1>
                        <p>The Geneva of Africa</p>
                        <div class="search-box">
                            <form action="{{route('web.listings.index')}}"
                                class="form-block d-flex">
                                <div class="search-input line">
                                    <div class="form-set mb-0">
                                        <select class="form-control select category-select">
                                            <option value>Choose Category</option>
                                            <option>Safaris</option>
                                            <option>Museums</option>
                                            <option>Nature</option>
                                            <option>Wildlife</option>
                                            <option>Walking Tour</option>
                                            <option>Luxury Hote & Apartments</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <div class="form-set mb-0">
                                        <div class="group-img">
                                            <select class="form-control select loc-select">
                                                <option value>Choose Location</option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                            </select>
                                            <i class="feather-map-pin"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-btn">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search m-0"
                                            aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>


<body class="body-three">
    <div class="main-wrapper">

        <header class="header header-three">
            <div class="container">
                <x-web.header-list-component />
            </div>
        </header>
<!-- 
        <section class="gallery-section-five">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading heading-five aos" data-aos="fade-up">
                            <h2>Discover Arusha Culture</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 aos" data-aos="fade-up">
                        <div class="gal-wrap">
                            <img src="{{ asset('images/MERU2.jpeg') }}" class="img-fluid" alt="img">
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <h5>Mount Meru</h5>
                                    <p>The Pride of Arusha</p>
                                </div>
                                <div class="rating d-flex">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 aos" data-aos="fade-up">
                        <div class="gal-wrap">
                            <img src="{{ asset('images/Arusha-National-Park.jpg') }}" class="img-fluid" alt="img">
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <h5>Arusha National Park</h5>
                                </div>
                                <div class="rating d-flex">

                                </div>
                            </div>
                        </div>
                        <div class="gal-wrap">
                            <img src="{{ asset('images/meru.jpeg') }}" class="img-fluid" alt="img">
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <h5>The Pride of Arusha</h5>
                                </div>
                                <div class="rating d-flex">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 aos" data-aos="fade-up">
                        <div class="gal-wrap">
                            <img src="{{ asset('images/Arusha_City_view.jpg') }}" class="img-fluid" alt="img">
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <h5>Arusha City</h5>
                                </div>
                                <div class="rating d-flex">

                                </div>
                            </div>
                        </div>
                        <div class="gal-wrap">
                            <img src="{{ asset('images/Arusha_City_view.jpg') }}" class="img-fluid" alt="img">
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <h5>Arusha Town</h5>
                                </div>
                                <div class="rating d-flex">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="work-section listing-section">
        <div class="container">
          <div class="work-heading">
            <h4>Things To Do in Arusha </h4>
            <p class="description">Add your business to Listee, so customers can easily find</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <img src="{{ asset('images/National-aprk.webp') }}" class="img-fluid" alt />
                <h5>01</h5>
                <h6>Arusha National Park</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <h5 class="mt-0">02</h5>
                <h6>Cultural Heritage Centre</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
                <img src="{{ asset('images/Cultural-heritage.jpg.webp') }}" class="img-fluid" alt />
              </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <img src="{{ asset('images/MERU2.jpeg') }}" class="img-fluid" alt />
                <h5>03</h5>
                <h6>Mount Meru</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
              </div>
              
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <img src="{{ asset('images/National-aprk.webp') }}" class="img-fluid" alt />
                <h5>04</h5>
                <h6>Hot Air Balloon Safaris</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <h5 class="mt-0">07</h5>
                <h6>Maasai Market</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
                <img src="{{ asset('images/Cultural-heritage.jpg.webp') }}" class="img-fluid" alt />
              </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <img src="{{ asset('images/MERU2.jpeg') }}" class="img-fluid" alt />
                <h5>06</h5>
                <h6>Coffee Plantation Tours</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <img src="{{ asset('images/National-aprk.webp') }}" class="img-fluid" alt />
                <h5>08</h5>
                <h6>Hot Air Balloon Safaris</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <h5 class="mt-0">09</h5>
                <h6>Maasai Market</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
                <img src="{{ asset('images/Cultural-heritage.jpg.webp') }}" class="img-fluid" alt />
              </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex">
              <div class="work-info card">
                <img src="{{ asset('images/MERU2.jpeg') }}" class="img-fluid" alt />
                <h5>10</h5>
                <h6>Coffee Plantation Tours</h6>
                <p>Morbi nisi justo, venenatis ac nibh at, bibendum mattis risus. Maecenas tincidunt, ligula sed congue tempus, magna augue cursus ipsum, in malesuada justo risus nec lorem. Nam augue augue, mollis nec condimentum euismod, lacinia ultricies leo.</p>
              </div>
            </div>
          </div>
        </div>
        
      </section>


        <section class="gallery-section-five">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading heading-five aos" data-aos="fade-up">
                            <h2>Arusha Gallery</h2>
                        </div>
                    </div>
                </div>
                         
                <div class="gallerypage-info listing-section ">
                    <div class="container">
                        <div class="gallery-content">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/MERU2.jpeg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget me-0">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget me-0">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget me-0">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget me-0">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget me-0">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="gallery-widget me-0">
                                        <a href="{{ asset('images/girrafe.jpg') }}" data-fancybox="gallery2">
                                            <img class="img-fluid" alt="Image"
                                                src="{{ asset('images/girrafe.jpg') }}">
                                        </a>
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
                                                        <li class="page-item active">
                                                            <a class="page-link" href="#">2 <span
                                                                    class="visually-hidden">(current)</span></a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">...</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#">14</a>
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



        </section>        


       






        <div class="bloglisting">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="bloglist-widget">
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="{{ route('web.explore.explore-details') }}"><img class="img-fluid"
                                            src="{{ asset('images/Arusha-National-Park.jpg') }}"
                                            alt="Post Image" /></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <div class="post-author-img">
                                                    <img src="{{ asset('images/Arusha-National-Park.jpg') }}"
                                                        alt="author" />
                                                </div>
                                                <a href="javascript:void(0)"><span> Mary </span></a>
                                            </div>
                                        </li>
                                        <li class="date-icon">
                                            <i class="fa-solid fa-calendar-days"></i> October 6,
                                            2022
                                        </li>
                                    </ul>
                                    <h3 class="blog-title">
                                        <a href="{{ route('web.explore.explore-details') }}">Arusha National Park</a>
                                    </h3>
                                    <p class="mb-0">
                                        Arusha National Park is one of the gems of northern Tanzania, offering diverse
                                        wildlife,
                                        stunning landscapes,
                                        and various outdoor activities. Here's
                                        a comprehensive guide on why you should visit Arusha National Park and what to
                                        expect
                                    </p>
                                    <div class="viewlink">
                                        <a href="blog-details.html">View Details <i
                                                class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="{{ route('web.explore.explore-details') }}"><img class="img-fluid"
                                            src="{{ asset('images/MERU2.jpeg') }}" alt="Post Image" /></a>
                                </div>
                                <div class="blog-content">

                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <div class="post-author-img">
                                                    <img src="{{ asset('images/Mount-Meru.jpg') }}" alt="author" />
                                                </div>
                                                <a href="javascript:void(0)">
                                                    <span> Barbara </span></a>
                                            </div>
                                        </li>
                                        <li class="date-icon">
                                            <i class="fa-solid fa-calendar-days"></i> October 9,
                                            2022
                                        </li>
                                    </ul>
                                    <h3 class="blog-title">
                                        <a href="blog-details.html">Great Business Tips in 2022</a>
                                    </h3>
                                    <p class="mb-0">
                                        Contrary to popular belief, Lorem Ipsum is not simply
                                        random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 2000 years old.
                                        Richard
                                    </p>
                                    <div class="viewlink">
                                        <a href="{{ route('web.explore.explore-details') }}">View Details <i
                                                class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid"
                                            src="{{ asset('images/meru.jpeg') }}" alt="Post Image" /></a>
                                </div>
                                <div class="blog-content">

                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <div class="post-author-img">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="author" />
                                                </div>
                                                <a href="javascript:void(0)">
                                                    <span> Darryl </span></a>
                                            </div>
                                        </li>
                                        <li class="date-icon">
                                            <i class="fa-solid fa-calendar-days"></i> October 7,
                                            2022
                                        </li>
                                    </ul>
                                    <h3 class="blog-title">
                                        <a href="{{ route('web.explore.explore-details') }}">8 Amazing Tricks About
                                            Business</a>
                                    </h3>
                                    <p class="mb-0">
                                        Contrary to popular belief, Lorem Ipsum is not simply
                                        random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 2000 years old.
                                        Richard
                                    </p>
                                    <div class="viewlink">
                                        <a href="{{ route('web.explore.explore-details') }}">View Details <i
                                                class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog-pagination">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item previtem">
                                        <a class="page-link" href="#"><i
                                                class="fas fa-regular fa-arrow-left"></i> Prev</a>
                                    </li>
                                    <li class="justify-content-center pagination-center">
                                        <div class="pagelink">
                                            <ul>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2
                                                        <span class="visually-hidden">(current)</span></a>
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
                    <div class="col-lg-4 theiaStickySidebar">
                        <div class="rightsidebar">
                            <div class="card">
                                <h4>
                                    <img src="assets/img/details-icon.svg" alt="details-icon" />
                                    Filter
                                </h4>
                                <div class="filter-content looking-input form-set mb-0">
                                    <input type="text" class="form-control"
                                        placeholder="To Search type and hit enter" />
                                </div>
                            </div>
                            <div class="card">
                                <h4>
                                    <img src="assets/img/category-icon.svg" alt="details-icon" />
                                    Visit Arusha
                                </h4>
                                <ul class="blogcategories-list">
                                    <li>
                                        <a href="javascript:void(0)">Safari and Wildlife</a>
                                    </li>
                                    <li><a href="javascript:void(0)">Events and Festivals</a></li>
                                    <li><a href="javascript:void(0)">Mountain Adventures</a></li>
                                    <li><a href="javascript:void(0)">Art and Crafts</a></li>
                                    <li><a href="javascript:void(0)">Nature and Adventure</a></li>
                                    <li><a href="javascript:void(0)">Comfortable Accommodations</a></li>
                                </ul>
                            </div>
                            <div class="card">
                                <h4><i class="feather-tag"></i>Related Post</h4>
                                <div class="article">
                                    <div class="article-blog">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="assets/img/blog/blog-3.jpg" alt="Blog" />
                                        </a>
                                    </div>
                                    <div class="article-content">
                                        <h5>
                                            <a href="{{ route('web.explore.explore-details') }}">Great Business Tips
                                                in 2022</a>
                                        </h5>
                                        <div class="article-date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>October 6, 2022</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="article">
                                    <div class="article-blog">
                                        <a href="{{ route('web.explore.explore-details') }}">
                                            <img class="img-fluid" src="assets/img/blog/blog-4.jpg" alt="Blog" />
                                        </a>
                                    </div>
                                    <div class="article-content">
                                        <h5>
                                            <a href="{{ route('web.explore.explore-details') }}">Excited News About
                                                Fashion.</a>
                                        </h5>
                                        <div class="article-date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>October 9, 2022</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="article">
                                    <div class="article-blog">
                                        <a href="{{ route('web.explore.explore-details') }}">
                                            <img class="img-fluid" src="assets/img/blog/blog-5.jpg" alt="Blog" />
                                        </a>
                                    </div>
                                    <div class="article-content">
                                        <h5>
                                            <a href="{{ route('web.explore.explore-details') }}">8 Amazing Tricks
                                                About Business</a>
                                        </h5>
                                        <div class="article-date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>October 10, 2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>





        <footer class="footer-blk footer-three">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="middle-foo-widget">
                            <div class="row sm-row-gap-23">
                                <div class="col-md-12">
                                    <div class="links-blk">
                                        <div class="row sm-row-gap-23">
                                            <div class="col-auto col-md-3">
                                                <div class="col-style">
                                                    <h5>Contact Us</h5>
                                                    <ul class="footer-contacts ">
                                                        <li>
                                                            <span><i class="fa fa-envelope"></i></span><a
                                                                href="mailto:info@arusha.tz"
                                                                target="_blank">info@arusha.tz</a>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa fa-map-marker"></i></span><a
                                                                href="#" target="_blank">Arusha Tanzania</a>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa fa-phone"></i></span><a
                                                                href="#">+255 (7123)
                                                                123456 </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto col-md-3">
                                                <div class="col-style">
                                                    <h5>Quick links</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Home</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">About Us</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('web.listings.index') }}">Listing</a>
                                                        </li>

                                                        <li><a href="#">Our Blog</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto col-md-3">
                                                <div class="col-style">
                                                    <h5>Useful Links</h5>
                                                    <ul>
                                                        <li><a href="#">Privacy Policy</a></li>
                                                        <li><a href="#">Terms & Conditions</a></li>
                                                        <li><a href="#">Help Centre</a></li>
                                                        <li><a href="#">Sitemap</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto col-md-3">
                                                <div class="col-style">
                                                    <h5>Subscribe To Our Website
                                                    </h5>
                                                    <div class="footer-subscribe">
                                                        <p class=" white-text">Subscribe to Our Newsletter for the
                                                            Latest Updates and
                                                            Events!</p>
                                                        <form action="">
                                                            <div class="input-group mb-3">
                                                                <input type="email" id="email" name="email"
                                                                    class="form-control subscribe-input"
                                                                    placeholder="Enter email address"
                                                                    aria-label="Enter email address"
                                                                    aria-describedby="btn-subscribe">
                                                                <button class="btn btn-primary" type="submit"
                                                                    id="btn-subscribe"><i
                                                                        class="fas fa-paper-plane"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="btm-foo-widget">
                            <div class="copy-info">
                                <p>Copyright © {{ date('Y') }} {{ config('app.name') }}. All rights are reserved.
                                </p>
                            </div>
                            <div class="social-info">
                                <ul class="d-flex">
                                    <li>
                                        <a href="javscript:;"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="javscript:;"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javscript:;"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="javscript:;"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/aos/aos.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>

</body>

</html>
