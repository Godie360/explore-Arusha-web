<x-web-layout>
    @push('styles')
    @endpush
    @push('scripts')
    @endpush

    <div class="contactbanner innerbanner">
        <div class="inner-breadcrumb">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12 ">
                        <h2 class="breadcrumb-title">Contact Us</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contactus-info">
        <div class="container contact-contents">
            <div class="contact-info">
                <h2>Contact <span>Us</span></h2>
                <p>We are here to help you</p>
            </div>
            <div class="row">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <div class="card card-theme">
                            <div class="card-header">
                                <h3 class="">Arusha Regional Administrator's Office</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-contents">
                                    <ul class="no-list-style">
                                        <li>
                                            <span>
                                                <i class="fas fa-map-marker"></i>
                                            </span>
                                            <a>2330 Arusha,Sekei Road,
                                                Tanzania 2330 Arusha,Sekei Road,
                                                Tanzania</a>
                                        </li>
                                        <li><span><i class="fas fa-phone"></i></span> <a
                                                href="tel:+2557123456789">+2557123456789</a></li>
                                        <li><span><i class="fas fa-envelope"></i></span> <a
                                                href="mailto:regionalofice@arusha.com">regionalofice@arusha.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <section class="contactusform-section">
        <div class="container">
            <div class="enquiry-cantent">
                <div class="card">
                    <div class="card-body">
                        <p>If you have any questions or inquiries, we would greatly value your input.</p>
                        <form action="{{ route('web.contact_us_store') }}" method="Post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label required" for="full_name">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" id="full_name"
                                            placeholder="Enter Full Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Enter Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="subject">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Enter Subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="message">Message</label>
                                        <textarea class="form-control" name="message" id="message" placeholder="Enter your message" cols="30"
                                            rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="form-check" value=""
                                            id="contact-form-check">
                                        <label class="form-check-label" for="contact-form-check">
                                            I would like to receive offers, updates, and marketing information about
                                            Arusha.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-web-layout>
