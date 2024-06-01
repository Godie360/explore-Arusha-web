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
                            <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i
                                    class="fas fa-times"></i></a>
                        </div>
                        <ul class="navbar-nav main-nav my-2 my-lg-0">
                            <li><a href="{{ route('web.index') }}">Home</a></li>
                            <li><a href="#">Explore</a></li>
                            <li class="has-submenu">
                                <a href>Vendors <i class="fas fa-chevron-down"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Registration</a></li>
                                    <li><a href="#">Verification</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Listing</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Complaints</a></li>
                            <li><a href="{{ route('web.contact_us') }}">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center block-e">
                        <div class="cta-btn">
                            <a href="{{ route('login') }}" class="btn">sign in /</a>
                            <a href="{{ route('register') }}" class="btn ms-1"> register</a>
                        </div>
                    </div>
                </nav>
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
                                                            <a href="#">Listing</a>
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
