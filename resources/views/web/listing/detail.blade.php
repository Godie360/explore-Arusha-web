<x-web-layout>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const stars = document.querySelectorAll('.reviewbox-rating .fa-star');
                const ratingInput = document.getElementById('rating');

                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        const ratingValue = this.getAttribute('data-value');
                        ratingInput.value = ratingValue;
                        updateStars(ratingValue);
                    });

                    star.addEventListener('mouseover', function() {
                        const ratingValue = this.getAttribute('data-value');
                        updateStars(ratingValue);
                    });

                    star.addEventListener('mouseout', function() {
                        updateStars(ratingInput.value);
                    });
                });

                function updateStars(ratingValue) {
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= ratingValue) {
                            star.classList.add('filled');
                        } else {
                            star.classList.remove('filled');
                        }
                    });
                }
            });
        </script>
    @endpush
    <div class="bannergallery-section">

        <div class="gallery-slider d-flex">
            @if ($service->files->count() > 0)
                @foreach ($service->files as $key => $file)
                    <div class="gallery-widget">
                        <a href="{{ $file->file }}" data-fancybox="gallery1">
                            <img class="img-fluid" alt="Image" src="{{ $file->file }}">
                        </a>
                    </div>
                @endforeach
            @else
                <div class="gallery-widget">
                    <a href="{{ $service->featured_image }}" data-fancybox="gallery1">
                        <img class="img-fluid" alt="Image" src="{{ $service->featured_image }}">
                    </a>
                </div>
            @endif


            <div class="showphotos">
                <a href="{{ $service->featured_image }}" data-fancybox="gallery1">... Show
                    Photos</a>
            </div>
        </div>
    </div>


    <section class="details-description">
        <div class="container">
            <div class="about-details">
                <div class="about-headings">
                    <div class="author-img">
                        <img src="{{ $service->user->profile_photo }}" alt="authorimg">
                    </div>
                    <div class="authordetails">
                        <h5>{{ $service->title }}</h5>
                        <p>{{ $service->short_description }}</p>
                        <div class="rating">
                            <i
                                class="fa-star  {{ $service->rate >= 1 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                            <i
                                class="fa-star  {{ $service->rate >= 2 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                            <i
                                class="fa-star  {{ $service->rate >= 3 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                            <i
                                class="fa-star  {{ $service->rate >= 4 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                            <i
                                class="fa-star  {{ $service->rate >= 5 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                            <span class="d-inline-block average-rating"> {{ $service->rate }} </span>
                        </div>
                    </div>
                </div>
                <div class="rate-details">
                    <h2>$350</h2>
                    <p>Fixed</p>
                </div>
            </div>
            <div class="descriptionlinks">
                <div class="row">
                    <div class="col-lg-9">
                        <ul>
                            <li><a href="javascript:void(0);"><i class="feather-map"></i> Get Directions</a>
                            </li>
                            <li><a href="javascript:void(0);"><i class="feather-globe"></i>Website</a></li>
                            <li><a href="javascript:void(0);"><i class="feather-share-2"></i> share</a></li>
                            <li><a href="javascript:void(0);"><i class="fa-regular fa-comment-dots"></i>
                                    Write a review</a></li>
                            <li><a href="javascript:void(0);"><i class="feather-flag"></i> report</a></li>
                            <li><a href="javascript:void(0);"><i class="feather-heart"></i> Save</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <div class="callnow">
                            <a href="#"> <i class="feather-phone-call"></i> Call Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="details-main-wrapper listing-section mt-3 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card ">
                        <div class="card-header">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            {!! $service->description !!}
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-header">
                            <i class="feather-list"></i>
                            <h4>Listing Features</h4>
                        </div>
                        <div class="card-body">
                            <div class="lisiting-featues">
                                <div class="row">
                                    @foreach ($service->amenities as $item)
                                        <div class="featureslist d-flex align-items-center col-lg-4 col-md-4">
                                            <div class="feature-icon">
                                                <i class="fas {{ $item->icon }}"></i>
                                            </div>
                                            <div class="featues-info">
                                                {{ $item->name }}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card gallery-section ">
                        <div class="card-header ">
                            <i class="feather-image"></i>
                            <h4>Gallery</h4>
                        </div>
                        <div class="card-body">
                            <div class="gallery-content">
                                <div class="row">

                                    <style>
                                        /* .gallery-widget img {
                                            width: 100%;
                                            height: 200px;

                                            object-fit: cover;
                                            object-position: center;
                                            display: block;
                                        } */
                                    </style>
                                    @foreach ($service->files as $key => $file)
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <div class="gallery-widget">
                                                <a href="{{ $file->file }}" data-fancybox="gallery1">
                                                    <img class="img-fluid" alt="Image{{ $key }}"
                                                        src="{{ $file->file }}">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card ">
                        <div class="card-header  align-items-center">
                            <i class="feather-star"></i>
                            <h4>Ratings</h4>
                        </div>
                        <div class="card-body">
                            <div class="ratings-content">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="ratings-info">
                                            <p class="ratings-score"><span>{{ $service->rate }}</span>/5</p>
                                            <p>OVERALL</p>
                                            <p> <i
                                                    class=" fa-star  {{ $service->rate >= 1 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                                                <i
                                                    class=" fa-star  {{ $service->rate >= 2 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                                                <i
                                                    class=" fa-star  {{ $service->rate >= 3 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                                                <i
                                                    class=" fa-star  {{ $service->rate >= 4 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                                                <i
                                                    class=" fa-star  {{ $service->rate >= 5 ? 'fas filled' : 'fa-regular rating-color' }}"></i>
                                            </p>
                                            <p>Based on Listing</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="ratings-table table-responsive">
                                            <table class>
                                                <tr>
                                                    <td class="star-ratings"><i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                    </td>
                                                    <td
                                                        class="scrore-width {{ $service->rate == 5 ? 'selected' : '' }} ">
                                                        <span> </span>
                                                    </td>
                                                    <td>{{ $service->rate == 5 ? '1' : '0' }} </td>
                                                </tr>
                                                <tr>
                                                    <td class="star-ratings"><i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                    <td
                                                        class="scrore-width  {{ $service->rate == 4 ? 'selected' : '' }} ">
                                                        <span> </span>
                                                    </td>
                                                    <td>{{ $service->rate == 4 ? '1' : '0' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="star-ratings"><i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                    </td>
                                                    <td
                                                        class="scrore-width {{ $service->rate == 3 ? 'selected' : '' }} ">
                                                        <span> </span>
                                                    </td>
                                                    <td>{{ $service->rate == 3 ? '1' : '0' }} </td>
                                                </tr>
                                                <tr>
                                                    <td class="star-ratings"><i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                    <td
                                                        class="scrore-width {{ $service->rate == 2 ? 'selected' : '' }} ">
                                                        <span> </span>
                                                    </td>
                                                    <td>{{ $service->rate == 2 ? '1' : '0' }} </td>
                                                </tr>
                                                <tr>
                                                    <td class="star-ratings"><i class="fas fa-star filled"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                        <i class="fa-regular fa-star rating-color"></i>
                                                    </td>
                                                    <td
                                                        class="scrore-width {{ $service->rate == 1 ? 'selected' : '' }} ">
                                                        <span> </span>
                                                    </td>
                                                    <td> {{ $service->rate == 1 ? '1' : '0' }} </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card review-sec  mb-0">
                        <div class="card-header  align-items-center">
                            <i class="fa-regular fa-comment-dots"></i>
                            <h4>Write a Review</h4>
                        </div>
                        <div class="card-body">
                            <div class="review-list">
                                <ul class>
                                    @foreach ($service->reviews as $item)
                                        <li class="review-box ">
                                            <div class="review-profile">
                                                <div class="review-img">
                                                    <img src="{{ $item->profilePhoto }}" class="img-fluid"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div class="review-details">
                                                <h6>{{ $item->name }}</h6>
                                                <div class="rating">
                                                    <div class="rating-star">
                                                        <i
                                                            class=" fa-star {{ $item->rate >= 1 ? 'fas filled' : 'fa-regular rating-overall' }}"></i>
                                                        <i
                                                            class=" fa-star {{ $item->rate >= 2 ? 'fas filled' : 'fa-regular rating-overall' }}"></i>
                                                        <i
                                                            class=" fa-star {{ $item->rate >= 3 ? 'fas filled' : 'fa-regular rating-overall' }}"></i>
                                                        <i
                                                            class=" fa-star {{ $item->rate >= 4 ? 'fas filled' : 'fa-regular rating-overall' }}"></i>
                                                        <i
                                                            class="fa-star {{ $item->rate >= 5 ? 'fas filled' : 'fa-regular rating-overall' }}"></i>
                                                    </div>
                                                    <div><i
                                                            class="fa-sharp fa-solid fa-calendar-days"></i>{{ $item->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                                <p>{!! $item->body !!}</p>

                                                <div class="reply-box ">
                                                    <p>Was This Review...? <a href="#" class="thumbsup"><i
                                                                class="feather-thumbs-up"></i> Like </a>
                                                        <a href="#" class="thumbsdown"><i
                                                                class="feather-thumbs-down"></i> Dislike </a>
                                                    </p>
                                                    <a href="#" class="replylink"><i
                                                            class="feather-corner-up-left"></i> Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="review-box feedbackbox mb-0">
                                        <div class="review-details">
                                            <h6>Leave Feedback About This</h6>
                                        </div>
                                        <div class="card-body">
                                            <form class="messages-form"
                                                action="{{ route('web.listings.review', $service->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-set">
                                                            <input type="text" class="form-control"
                                                                placeholder="Full Name*" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-set me-0">
                                                            <input type="tel" class="form-control"
                                                                placeholder="Phone Number*" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-set me-0">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email*" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-set">
                                                            <textarea rows="4" class="form-control" placeholder="Write a Review*" name="body" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <label class="custom_check">
                                                            <input type="checkbox" name="anonymous"
                                                                class="anonymous">
                                                            <span class="checkmark"></span>Post as anonymous
                                                        </label>
                                                    </div>
                                                </div>
                                                <style>
                                                    .details-main-wrapper .reviewbox-rating p i {
                                                        color: #ccc;
                                                        cursor: pointer;
                                                    }

                                                    .details-main-wrapper .reviewbox-rating p i.filled {
                                                        color: #ff823b;
                                                    }
                                                </style>
                                                <div class="reviewbox-rating">
                                                    <p><span> Rating</span>
                                                        <i class="fas fa-star" data-value="1"></i>
                                                        <i class="fas fa-star" data-value="2"></i>
                                                        <i class="fas fa-star" data-value="3"></i>
                                                        <i class="fas fa-star" data-value="4"></i>
                                                        <i class="fas fa-star" data-value="5"></i>
                                                    </p>
                                                    <input type="hidden" name="rate" id="rating"
                                                        value="0">
                                                </div>

                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn" type="submit"> Submit
                                                        Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 theiaStickySidebar">
                    <div class="rightsidebar">

                        <div class="card">
                            <h4><img src="assets/img/breifcase.svg" alt> Business Info</h4>
                            <div class="map-details">
                                <div class="map-frame">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.2238528387797!2d-122.41637708468208!3d37.78479337975754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858090475dcdc3%3A0x417fdbbd16e076ed!2s484%20Ellis%20St%2C%20San%20Francisco%2C%20CA%2094102%2C%20USA!5e0!3m2!1sen!2sin!4v1669879954211!5m2!1sen!2sin"
                                        width="200" height="160" style="border:0;" allowfullscreen
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <ul class="info-list">
                                    <li><i class="feather-map-pin"></i>{{ $service->address }}</li>
                                    <li><i class="feather-phone-call"></i>{{ $service->phone }}</li>
                                    <li><i class="feather-mail"></i> <a href="mailto:{{ $service->email }}"
                                            class="__cf_email__">{{ $service->email }}</a>
                                    </li>
                                    @if ($service->website)
                                        <li><i class="feather-globe"></i>{{ $service->website }}</li>
                                    @endif
                                    <li class="socialicons pb-0">
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <h4><i class="feather-pie-chart"></i> Statisfic</h4>
                            <ul class="statistics-list">
                                <li>
                                    <div class="statistic-details"><span class="icons"><i
                                                class="fa-regular fa-eye"></i></span>
                                        Views </div><span class="text-end"> {{ $service->views_count }}</span>
                                </li>
                                <li>
                                    <div class="statistic-details"><span class="icons"><i
                                                class="feather-star"></i></span>
                                        Ratings </div><span class="text-end"> {{ $service->review_count }}</span>
                                </li>
                                <li>
                                    <div class="statistic-details"><span class="icons"><i
                                                class="feather-heart"></i></span>
                                        favourites </div><span class="text-end"> 0</span>
                                </li>
                                <li class="mb-0">
                                    <div class="statistic-details"><span class="icons"><i
                                                class="feather-share-2"></i></span>
                                        Shares </div><span class="text-end"> 0</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card">
                            <h4> <i class="feather-user"></i> Author</h4>
                            <div class="sidebarauthor-details align-items-center">
                                <div class="sideauthor-img">
                                    <img src="{{ $service->user->profile_photo }}" alt="author">
                                </div>
                                <div class="sideauthor-info">
                                    <p class="authorname">{{ $service->user->name }}</p>
                                    <p>Member since {{ $service->user->created_at->format('d M, Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <h4> <i class="feather-phone-call"></i> Contact Business</h4>
                            <form class="contactbusinessform">
                                <div class="form-set">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-set">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-set">
                                    <textarea rows="6" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-web-layout>
