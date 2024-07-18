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
                                    <a href="https://youtu.be/JG5znweDBXU?si=jjyGATfTxnI-xljT" data-fancybox
                                        class="play-icon"><i class="fa-solid fa-play"></i></a>
                                    <span class="animate-circle"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 


          <section class="car-rental-slider-section aos" data-aos="fade-up">
            <div class="car-rental-carousel">
            <div class="car-rental-slider owl-carousel owl-theme">
            <div class="car-rental-slider-item">
            <img src="{{ asset('images/girrafe (2).jpg') }}" class="img-fluid" alt>
            <div class="container">
            <div class="car-rental-carousel-content">
            <h6>Limited Edition</h6>
            <h3 class=" aos" data-aos="fade-up" data-aos-delay="200">2021 Jaguar XF facelift</h3>
            <h5 class=" aos" data-aos="fade-up" data-aos-delay="300"><span>$400</span>/ Month</h5>
            <p class=" aos" data-aos="fade-up" data-aos-delay="400">$0 First payment paid by jaquar up to $325.<br>taxes, title and fees extra</p>
            <a href="contact.html">Test Drive</a>
            </div>
            </div>
            </div>
            <div class="car-rental-slider-item">
            <img src="{{ asset('images/masaai.jpg') }}" class="img-fluid" alt>
            <div class="container">
            <div class="car-rental-carousel-content">
            <h6>Limited Edition</h6>
            <h3>2021 Audi RS7</h3>
            <h5><span>$450</span>/ Month</h5>
            <p>$0 First payment paid by jaquar up to $453.<br>taxes, title and fees extra</p>
            <a href="signup.html">Test Drive</a>
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>   --}}




        <section class="perfect-holiday-cabin-section">
            <div class="holiday-cabin-img-slider owl-carousel">
                <div class="item">
                    <img src="{{ asset('images/girrafe (2).jpg') }}" class="img-fluid" alt />
                    <div class="container">
                        <div class="holiday-cabin-info" data-aos="fade-up">
                            <div class="rate-per-day">
                                <span>$64 /</span>
                                <h6>Per night</h6>
                            </div>
                            <div class="section-heading">
                                <h2>The Geneva of Africa</h2>
                                <p>
                                    Spectacular Condo In Summerlin! View of Spring Mountains and
                                    Charleston Peak!!! 1 Bedrooms, Private Bathroom and a Queen
                                    Size Vertical Wall Bed. Fireplace, Kitchen, Dishwasher and
                                    Microwave , Open And Spacious Floorplan! Great Summerlin
                                    Location!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/girrafe (2).jpg') }}" class="img-fluid" alt />
                    <div class="container">
                        <div class="holiday-cabin-info">
                            <div class="rate-per-day">
                                <span>$64</span>
                              <h6>Per night</h6>
                            </div>
                            <div class="section-heading">
                                <h2>The Geneva of Africa</h2>
                                <p>
                                    Spectacular Condo In Summerlin! View of Spring Mountains and
                                    Charleston Peak!!! 1 Bedrooms, Private Bathroom and a Queen
                                    Size Vertical Wall Bed. Fireplace, Kitchen, Dishwasher and
                                    Microwave , Open And Spacious Floorplan! Great Summerlin
                                    Location!
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/girrafe (2).jpg') }}" class="img-fluid" alt />
                    <div class="container">
                        <div class="holiday-cabin-info">
                            <dclass="rate-per-day">
                                <span>$64</span>
                                <h6>Per night</h6>
                            </dclass=>
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
                            <a href="{{route('web.nationalpark')}}"><img src="{{ asset('images/meru.jpeg') }}" class="img-fluid" alt="img"></a>
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <a href="{{route('web.nationalpark')}}"><h5>Arusha National Park</h5></a>
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
                            <a href="{{route('web.cultureheritage')}}"><img src="{{ asset('images/Cultural-heritage.jpg.webp') }}" class="img-fluid" alt="img"></a>

                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <a href="{{route('web.cultureheritage')}}"><h5>Arusha Cultural Heritage</h5></a>
                                    <p>The Pride Of Arusha</p>
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
                            <a href="{{route('web.oldvai')}}"><img src="{{ asset('images/olduvai gorge.jpg') }}" class="img-fluid" alt="img"></a>
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <a href="{{route('web.oldvai')}}"><h5>Oldvai Gorge</h5></a>
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
                            <a href="{{route('web.shanga')}}"><img src="{{ asset('images/shanga-arusha-coffee-lodge.jpg.webp') }}" class="img-fluid"
                                alt="img"></a>
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                   <a href="{{route('web.shanga')}}"><h5>SHANGA</h5></a>
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
                            <a href="{{route('web.duluti')}}"><img src="{{ asset('images/lake duluti.jpg') }}" class="img-fluid" alt="img"></a>
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <a href="{{route('web.duluti')}}"><h5>Lake Duluti</h5></a>
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
                            <a href="{{route('web.oldonyo')}}"><img src="{{ asset('images/oldonyo.jpg') }}" class="img-fluid" alt="img"></a>
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <a href="{{route('web.oldonyo')}}"><h5>Oldonyo Lengai</h5></a>
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
                            <a href="{{route('web.arushacity')}}"><img src="{{ asset('images/Arusha_City_view.jpg') }}" class="img-fluid" alt="img"></a>
                            <div class="city-overlay city-five-overlay">
                                <div class="city-name">
                                    <a href="{{route('web.arushacity')}}"><h5>Arusha Town</h5></a>
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


        <section class="celebrate-section">
            <div class="container">
                <div class="section-heading-two text-center">
                    <div class="row">
                        <div class="col-md-12 aos" data-aos="fade-up">
                            <h2>Visit Amazing Place in Arusha</h2>

                            <div class="contactus-info">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 contactus-img col-md-12">
                                            <div class="contactleft-info">
                                                <img src="{{ asset('images/arusha-board.jpg') }}"
                                                    class="img-fluid" alt />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 contactright-map col-md-12">
                                            <div class="google-maps">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63724.851479161014!2d36.6772128!3d-3.39814375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18371c88f2387383%3A0xbc1907f7ec497152!2sArusha!5e0!3m2!1sen!2stz!4v1719389584364!5m2!1sen!2stz"
                                                    width="600" height="544" style="border: 0" allowfullscreen
                                                    loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   </section>


        <section class="city-section">
            <div class="container">
                <div class="city-sec">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="section-heading heading-four aos" data-aos="fade-up">
                                <h2>Dive into Arusha Culture</h2>
                                <p>Search for coworking spaces in our most popular cities</p>
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-sm-6 aos" data-aos="fade-up">
                            <div class="city-wrap">
                                <div class="city-img">
                                    <img src="{{ asset('images/masai2.jpg') }}" class="img-fluid" alt="blog-img">
                            
                                </div>
                                <div class="city-content">
                                    <h5><a>Masaai Culture</a></h5>
                                    <p><span>Masaai Tribe</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 aos" data-aos="fade-up">
                            <div class="city-wrap">
                                <div class="city-img">
                                    <img src="{{ asset('images/hadzabe2.jpg') }}" class="img-fluid" alt="blog-img">
                                </div>
                                <div class="city-content">
                                    <h5><a>Hadzabe Culture</a></h5>
                                    <p><span>Hadzabe People</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 aos" data-aos="fade-up">
                            <div class="city-wrap">
                                <div class="city-img">
                                    <img src="{{ asset('images/chaga.jpg') }}" class="img-fluid" alt="blog-img">
                                    
                                </div>
                                <div class="city-content">
                                    <h5><a href="#">Chagga People</a></h5>
                                    <p><span>Chuggastan</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 aos" data-aos="fade-up">
                            <div class="city-wrap">
                                <div class="city-img">
                                    <img src="{{ asset('images/market.jpg') }}" class="img-fluid" alt="blog-img">
                                    
                                </div>
                                <div class="city-content">
                                    <h5><a>Local Markets</a></h5>
                                    <p><span>Arusha Local Markets</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 aos" data-aos="fade-up">
                            <div class="city-wrap">
                                <div class="city-img">
                                    <img src="{{ asset('images/tanzanite.jpg') }}" class="img-fluid" alt="blog-img">
                                   
                                </div>
                                <div class="city-content">
                                    <h5><a>Tanzanite Gems</a></h5>
                                    <p><span>Visit Tanzanite Meseums</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 aos" data-aos="fade-up">
                            <div class="city-wrap">
                                <div class="city-img">
                                    <img src="{{ asset('images/wadudu2.jpeg') }}" class="img-fluid" alt="blog-img">
                                </div>
                                <div class="city-content">
                                    <h5><a>Wadudu</a></h5>
                                    <p><span>Arusha THUGS</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="buy-property aos" data-aos="fade-up">
            <div class="container">
              <div class="buy-property-content">
                <h2 class="aos" data-aos="fade-up" data-aos-delay="200">
                    Join the Excitement at Explore Arusha!
                </h2>
                <p class="aos" data-aos="fade-up" data-aos-delay="400">
                    Be a part of Arusha's most vibrant marketplace. 
                    Showcase your products, connect with thousands of visitors, 
                    and elevate your business at this premier event.
                </p>
                <a href="{{ route('web.vendor.registration.index') }}">Register Here</a>
              </div>
            </div>          
          </section>

          <section class="buy-property aos" data-aos="fade-up"> </section>

          
        <section class="car-clients">
        <div class="container">
          <div class="row aos" data-aos="fade-up">
            <div class="col-lg-12">
              <div class="home-six-heading-section">
                <div class="home-six-title d-flex justify-content-center align-items-center">
                  <h2>What People Say About Arusha</h2>
                </div>
                <p>Arusha is often described as a vibrant city with beautiful landscapes, rich cultural heritage, and a dynamic atmosphere</p>
              </div>
            </div>
          </div>
          <div class="car-class-carousel aos" data-aos="fade-up" data-aos-delay="200">
            <div class="client-testimonial-slider owl-carousel owl-theme">
              <div class="car-client-item">
                <div class="car-client-review">
                  <img src="{{ asset('images/makonda.webp') }}" alt />
                  <h3>Paul Makonda </h3>
                  <h5>Arusha Regional Commisioner</h5>
                  <p class="m-0">Arusha, located in northern Tanzania, is celebrated as the gateway to some of Africa's most iconic natural wonders, including the Serengeti National Park and the Ngorongoro Conservation Area. This strategic positioning makes it a magnet for tourists eager to embark on safari adventures or witness the annual wildebeest migration.</p>
                  <div class="car-client-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="car-client-user">
                <img src="{{ asset('images/makonda.webp') }}" alt />
                </div>
              </div>
              <div class="car-client-item">
                <div class="car-client-review">
                  <img src="assets/img/Polygon.svg" alt />
                  <h3>Saad Karwani</h3>
                  <h5>Visitor</h5>
                  <p class="m-0">Arusha, located in northern Tanzania, is celebrated as the gateway to some of Africa's most iconic natural wonders, including the Serengeti National Park and the Ngorongoro Conservation Area. This strategic positioning makes it a magnet for tourists eager to embark on safari adventures or witness the annual wildebeest migration.</p>
                  <div class="car-client-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="car-client-user">
                  <img src="{{ asset('images/saad.jpeg') }}" alt />
                </div>
              </div>
              <div class="car-client-item">
                <div class="car-client-review">
                  <h3>Cecil Mhina</h3>
                  <h5>Visitor</h5>
                  <p class="m-0">Arusha, located in northern Tanzania, is celebrated as the gateway to some of Africa's most iconic natural wonders, including the Serengeti National Park and the Ngorongoro Conservation Area. This strategic positioning makes it a magnet for tourists eager to embark on safari adventures or witness the annual wildebeest migration.</p>
                  <div class="car-client-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="car-client-user">
                  <img src="{{ asset('images/cecil.jpeg') }}" alt />
                </div>
              </div>
              <div class="car-client-item">
                <div class="car-client-review">
                  <img src="assets/img/Polygon.svg" alt />
                  <h3>Daniela Fransis</h3>
                  <h5>Customer</h5>
                  <p class="m-0">Arusha, located in northern Tanzania, is celebrated as the gateway to some of Africa's most iconic natural wonders, including the Serengeti National Park and the Ngorongoro Conservation Area. This strategic positioning makes it a magnet for tourists eager to embark on safari adventures or witness the annual wildebeest migration.</p>
                  <div class="car-client-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="car-client-user">
                  <img src="assets/img/profiles/avatar-12.jpg" alt />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



          <section class="blog-section-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading-two text-center">
                            <h2>Latest News</h2>
                        </div>
                        <div class="owl-carousel blog-slider">
                            <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('images/tanzanite.jpg') }}"
                                            alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="blog-details.html">Wedding Tips For Fashion</a></h3>
                                    <ul class="entry-meta meta-item">
                                        <li class="date-icon"><i class="feather-calendar"></i> 7 Jan 2023</li>
                                        <li class="blog-cat">Wedding</li>
                                    </ul>
                                    <p class="blog-description">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                                    </p>
                                    <div class="viewlink">
                                        <a href="blog-details.html">View More <i
                                                class="feather-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('images/snake-arusha.webp') }}"
                                            alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="blog-details.html">Pre-Wedding Photoshoot</a></h3>
                                    <ul class="entry-meta meta-item">
                                        <li class="date-icon"><i class="feather-calendar"></i> 15 Jan 2023</li>
                                        <li class="blog-cat">Photography</li>
                                    </ul>
                                    <p class="blog-description">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                                    </p>
                                    <div class="viewlink">
                                        <a href="blog-details.html">View More <i
                                                class="feather-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('images/Arusha_City_view.jpg') }}"
                                            alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="blog-details.html">Special Food wedding</a></h3>
                                    <ul class="entry-meta meta-item">
                                        <li class="date-icon"><i class="feather-calendar"></i> 27 Feb 2023</li>
                                        <li class="blog-cat">Catering</li>
                                    </ul>
                                    <p class="blog-description">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                                    </p>
                                    <div class="viewlink">
                                        <a href="blog-details.html">View More <i
                                                class="feather-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog grid-blog blog-two aos" data-aos="fade-up">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('images/Arusha_City_view.jpg') }}"
                                            alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="blog-details.html">Pre-Wedding Photoshoot</a></h3>
                                    <ul class="entry-meta meta-item">
                                        <li class="date-icon"><i class="feather-calendar"></i> 28 Mar 2023</li>
                                        <li class="blog-cat">Photography</li>
                                    </ul>
                                    <p class="blog-description">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                                    </p>
                                    <div class="viewlink">
                                        <a href="blog-details.html">View More <i
                                                class="feather-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="partners-section">
            <div class="container">
            <p class="partners-heading">Our Partners</p>
            <ul class="owl-carousel partnerslist d-flex">
            <li><a href="javascript:void(0);"><img class="img-fluid" src="{{ asset('images/tigo.png') }}" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-2.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-3.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-4.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-5.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-6.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-1.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-2.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-3.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-4.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-5.svg" alt="partners"></a></li>
            <li><a href="javascript:void(0);"><img class="img-fluid" src="assets/img/partners/partners-6.svg" alt="partners"></a></li>
            </ul>
            </div>
            </div>

      

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
