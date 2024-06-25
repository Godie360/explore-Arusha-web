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

<body class="body-three">
    <div class="main-wrapper">

        <header class="header header-three">
            <div class="container">
                <x-web.header-list-component />
            </div>
        </header>
        <section class="banner-section banner-three"
            style="background-image: url({{ asset('images/Arusha_City_view.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="banner-info-blk">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="banner-content-blk text-center">
                                    <h1>Welcome To Arusha</h1>
                                    <h5>The Geneva of Africa</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section class="section-blk activities-blk pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-blk justify-content-center text-center">
                            <h2 class="m-0">Top destinations with Activities</h2>
                        </div>
                        <div class="row row-gap-14">
                            <div class="col-sm-6 col-lg-4">
                                <div class="shadow-box d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="icon-blk rounded-circle overflow-hidden">
                                            <img src="{{ asset('images/arusha-declaration-icon.jpg') }}"
                                                alt="Within Arusha City">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>Within Arusha City</h4>
                                        <p>755 Tours & Activities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="shadow-box d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="icon-blk rounded-circle overflow-hidden">
                                            <img src="{{ asset('images/mount-meru-icon.jpg') }}"
                                                alt="Near Arusha City">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>Near Arusha City</h4>
                                        <p>60 Tours & Activities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="shadow-box d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="icon-blk rounded-circle overflow-hidden">
                                            <img src="{{ asset('images/ngorongor0-icon.jpg') }}"
                                                alt="Outside Arusha City">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4>Outside Arusha City</h4>
                                        <p>140 Tours & Activities</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="celebrate-section">
          <div class="container">
          <div class="section-heading-two text-center">
          <div class="row">
          <div class="col-md-12 aos" data-aos="fade-up">
          <p>Visit Arusha</p>
          <h2>Explore Arusha & It's Culture</h2>

          </div>
          </div>
          </div>
          <div class="owl-carousel celebrate-slider">
          <div class="item">
          <div class="celebrate-wrap aos" data-aos="fade-up">
          <div class="celebrate-img">
          <img src="{{ asset('images/girrafe (2).jpg') }}" alt="img">
          <div class="play-btn">
          <a href="https://youtu.be/JG5znweDBXU?si=jjyGATfTxnI-xljT" data-fancybox class="play-icon"><i class="fa-solid fa-play"></i></a>
          <span class="animate-circle"></span>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </section>


      <section class="perfect-holiday-cabin-section">
        <div class="holiday-cabin-img-slider owl-carousel">
          <div class="item">
            <img
              src="assets/img/bg/holiday-cabin-slider-img-1.jpg"
              class="img-fluid"
              alt
            />
            <div class="container">
              <div class="holiday-cabin-info" data-aos="fade-up">
                <div class="rate-per-day">
                  <span>$64 /</span>
                  <h6>Per night</h6>
                </div>
                <div class="section-heading">
                  <h2>Perfect Holiday Cabin</h2>
                  <p>
                    Spectacular Condo In Summerlin! View of Spring Mountains and
                    Charleston Peak!!! 1 Bedrooms, Private Bathroom and a Queen
                    Size Vertical Wall Bed. Fireplace, Kitchen, Dishwasher and
                    Microwave , Open And Spacious Floorplan! Great Summerlin
                    Location!
                  </p>
                </div>
                <div class="room-categories">
                  <span
                    ><img
                      src="assets/img/icons/area-icon.svg"
                      class="img-fluid"
                      alt
                    />Area:56000/m2</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/bed-icon.svg"
                      class="img-fluid"
                      alt
                    />Beds:3</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/floor-icon.svg"
                      class="img-fluid"
                      alt
                    />Floors:4</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/guest-icon.svg"
                      class="img-fluid"
                      alt
                    />Guest:4</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <img
              src="assets/img/bg/holiday-cabin-slider-img-2.jpg"
              class="img-fluid"
              alt
            />
            <div class="container">
              <div class="holiday-cabin-info">
                <div class="rate-per-day">
                  <span>$64</span>
                  <h6>Per night</h6>
                </div>
                <div class="section-heading">
                  <h2>Perfect Holiday Cabin</h2>
                  <p>
                    Spectacular Condo In Summerlin! View of Spring Mountains and
                    Charleston Peak!!! 1 Bedrooms, Private Bathroom and a Queen
                    Size Vertical Wall Bed. Fireplace, Kitchen, Dishwasher and
                    Microwave , Open And Spacious Floorplan! Great Summerlin
                    Location!
                  </p>
                </div>
                <div class="room-categories">
                  <span
                    ><img
                      src="assets/img/icons/area-icon.svg"
                      class="img-fluid"
                      alt
                    />Area:56000/m2</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/bed-icon.svg"
                      class="img-fluid"
                      alt
                    />Beds:3</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/floor-icon.svg"
                      class="img-fluid"
                      alt
                    />Floors:4</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/guest-icon.svg"
                      class="img-fluid"
                      alt
                    />Guest:4</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <img
              src="assets/img/bg/holiday-cabin-slider-img-1.jpg"
              class="img-fluid"
              alt
            />
            <div class="container">
              <div class="holiday-cabin-info">
                <div class="rate-per-day">
                  <span>$64</span>
                  <h6>Per night</h6>
                </div>
                <div class="section-heading">
                  <h2>Perfect Holiday Cabin</h2>
                  <p>
                    Spectacular Condo In Summerlin! View of Spring Mountains and
                    Charleston Peak!!! 1 Bedrooms, Private Bathroom and a Queen
                    Size Vertical Wall Bed. Fireplace, Kitchen, Dishwasher and
                    Microwave , Open And Spacious Floorplan! Great Summerlin
                    Location!
                  </p>
                </div>
                <div class="room-categories">
                  <span
                    ><img
                      src="assets/img/icons/area-icon.svg"
                      class="img-fluid"
                      alt
                    />Area:56000/m2</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/bed-icon.svg"
                      class="img-fluid"
                      alt
                    />Beds:3</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/floor-icon.svg"
                      class="img-fluid"
                      alt
                    />Floors:4</span
                  >
                  <span
                    ><img
                      src="assets/img/icons/guest-icon.svg"
                      class="img-fluid"
                      alt
                    />Guest:4</span
                  >
                </div>
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
                      <h2>Popular Place & Activities in Arusha</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 aos" data-aos="fade-up">
                    <div class="gal-wrap">
                        <img src="{{ asset('images/meru.jpeg') }}" class="img-fluid" alt="img">
                        <div class="city-overlay city-five-overlay">
                            <div class="city-name">
                                <h5>Arusha National Park</h5>
                                <p>Tourism Attraction</p>
                            </div>
                            <div class="rating d-flex">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 aos" data-aos="fade-up">
                    <div class="gal-wrap">
                        <img src="{{ asset('images/Cultural-heritage.jpg.webp') }}" class="img-fluid" alt="img">
                        <div class="city-overlay city-five-overlay">
                            <div class="city-name">
                                <h5>Arusha Cultural Heritage</h5>
                                <p>Tourism Attraction</p>
                            </div>
                            <div class="rating d-flex">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gal-wrap">
                        <img src="{{ asset('images/olduvai gorge.jpg') }}" class="img-fluid" alt="img">
                        <div class="city-overlay city-five-overlay">
                            <div class="city-name">
                                <h5>Oldvai Gorge</h5>
                            </div>
                            <div class="rating d-flex">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gal-wrap">
                      <img src="{{ asset('images/shanga-arusha-coffee-lodge.jpg.webp') }}" class="img-fluid" alt="img">
                      <div class="city-overlay city-five-overlay">
                          <div class="city-name">
                              <h5>SHANGA</h5>
                              <p>The Home Of Beads</p>
                          </div>
                          <div class="rating d-flex">
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 aos" data-aos="fade-up">
                    <div class="gal-wrap">
                        <img src="{{ asset('images/lake duluti.jpg') }}" class="img-fluid" alt="img">
                        <div class="city-overlay city-five-overlay">
                            <div class="city-name">
                                <h5>Lake Duluti</h5>
                            </div>
                            <div class="rating d-flex">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                        </div>
                    </div>
                    <div class="gal-wrap">
                        <img src="{{ asset('images/oldonyo.jpg') }}" class="img-fluid" alt="img">
                        <div class="city-overlay city-five-overlay">
                            <div class="city-name">
                                <h5>Oldonyo Lengai</h5>
                                <p></p>
                            </div>
                            <div class="rating d-flex">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
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
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                              <i class="fas fa-star filled"></i>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </section>



      <section class="property-articles">
        <div class="container">
          <div
            class="section-heading section-heading-nine aos"
            data-aos="fade-up"
          >
            <div class="row align-items-center">
              <div class="col-md-9 aos aos-init aos-animate" data-aos="fade-up">
                <h2>Recent Articles</h2>
                <p>The most trendy accommodations available</p>
              </div>
              <div
                class="col-md-3 text-md-end aos aos-init aos-animate"
                data-aos="fade-up"
              >
                <a href="categories.html" class="btn btn-view"
                  >View all Properties</a
                >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 aos" data-aos="fade-up">
              <div class="car-class-carousel">
                <div class="owl-carousel blog-slider">
                  <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                    <div class="blog-image">
                      <a href="blog-details.html"
                        ><img
                          class="img-fluid"
                          src="assets/img/blog/property-blog-1.jpg"
                          alt="Post Image"
                      /></a>
                    </div>
                    <div class="blog-content">
                      <h3 class="blog-title">
                        <a href="blog-details.html"
                          >Skills That You Can Learn In The Real Estate
                          Market</a
                        >
                      </h3>
                      <ul class="entry-meta meta-item">
                        <li class="date-icon">
                          <i class="feather-calendar"></i> 7 Jan 2023
                        </li>
                      </ul>
                      <p class="blog-description">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text.
                      </p>
                      <div class="viewlink">
                        <a href="blog-details.html">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                    <div class="blog-image">
                      <a href="blog-details.html"
                        ><img
                          class="img-fluid"
                          src="assets/img/blog/property-blog-2.jpg"
                          alt="Post Image"
                      /></a>
                    </div>
                    <div class="blog-content">
                      <h3 class="blog-title">
                        <a href="blog-details.html"
                          >5 Essential Steps for Buying an Investment</a
                        >
                      </h3>
                      <ul class="entry-meta meta-item">
                        <li class="date-icon">
                          <i class="feather-calendar"></i> 15 Jan 2023
                        </li>
                      </ul>
                      <p class="blog-description">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text.
                      </p>
                      <div class="viewlink">
                        <a href="blog-details.html">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                    <div class="blog-image">
                      <a href="blog-details.html"
                        ><img
                          class="img-fluid"
                          src="assets/img/blog/property-blog-3.jpg"
                          alt="Post Image"
                      /></a>
                    </div>
                    <div class="blog-content">
                      <h3 class="blog-title">
                        <a href="blog-details.html"
                          >Bedroom Colors You’ll Never Regret</a
                        >
                      </h3>
                      <ul class="entry-meta meta-item">
                        <li class="date-icon">
                          <i class="feather-calendar"></i> 27 Feb 2023
                        </li>
                      </ul>
                      <p class="blog-description">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text.
                      </p>
                      <div class="viewlink">
                        <a href="blog-details.html">Read More</a>
                      </div>
                    </div>
                  </div>
                  <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                    <div class="blog-image">
                      <a href="blog-details.html"
                        ><img
                          class="img-fluid"
                          src="assets/img/blog/property-blog-1.jpg"
                          alt="Post Image"
                      /></a>
                    </div>
                    <div class="blog-content">
                      <h3 class="blog-title">
                        <a href="blog-details.html"
                          >Skills That You Can Learn In The Real Estate
                          Market</a
                        >
                      </h3>
                      <ul class="entry-meta meta-item">
                        <li class="date-icon">
                          <i class="feather-calendar"></i> 28 Mar 2023
                        </li>
                      </ul>
                      <p class="blog-description">
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text.
                      </p>
                      <div class="viewlink">
                        <a href="blog-details.html">Read More</a>
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
                                                            <a href="{{route('web.listings.index')}}">Listing</a>
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
