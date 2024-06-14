<x-web-layout>
    @push('styles')
        <style>
            /*form styles*/
            #msform {
                text-align: center;
                position: relative;
                margin-top: 10px;
            }

            #msform fieldset .form-card {
                border: 0 none;
                border-radius: 0px;
                padding: 20px 20px 20px 20px;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                position: relative;
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0.5rem;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                padding-bottom: 20px;
                position: relative;
            }

            #msform fieldset:not(:first-of-type) {
                display: none;
            }

            #msform fieldset .form-card {
                text-align: left;
                color: #9E9E9E;
            }

            /*Dropdown List Exp Date*/
            select.list-dt {
                border: none;
                outline: 0;
                border-bottom: 1px solid #ccc;
                padding: 2px 5px 3px 5px;
                margin: 2px;
            }

            select.list-dt:focus {
                border-bottom: 2px solid #64bd4f;
            }

            /*The background card*/
            .card {
                z-index: 0;
                border: none;
                border-radius: 0.5rem;
                position: relative;
            }

            .card.vendor-registration .card-header {
                border: none;
                text-align: center;
            }

            /*FieldSet headings*/
            .fs-title {
                font-size: 25px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left;
            }

            /*progressbar*/
            #progressbar {
                margin-bottom: 10px;
                overflow: hidden;
                color: lightgrey;
            }

            #progressbar .active {
                color: #000000;
            }

            #progressbar li {
                list-style-type: none;
                font-size: 12px;
                width: 20%;
                float: left;
                position: relative;
            }

            /*Icons in the ProgressBar*/
            #progressbar #account:before {
                font-family: FontAwesome;
                content: "\f1ad";
            }

            #progressbar #personal:before {
                font-family: FontAwesome;
                content: "\f2b9";
            }

            #progressbar #payment:before {
                font-family: FontAwesome;
                content: "\f0c0";
            }

            #progressbar #confirm:before {
                font-family: FontAwesome;
                content: "\f00c";
            }

            #progressbar #login:before {
                font-family: FontAwesome;
                content: "\f090";
            }

            /*ProgressBar before any progress*/
            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 18px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px;
            }

            /*ProgressBar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1;
            }

            /*Color number of the step and the connector before it*/
            #progressbar li.active:before,
            #progressbar li.active:after {
                background: #64bd4f;
            }
        </style>
    @endpush
    @push('scripts')
        <script>
            $(document).ready(function() {
                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;
                var success_message = "";
                // Function to validate required fields
                function validateFields() {
                    var isValid = true;
                    current_fs.find('input[required], select[required]').each(function() {
                        if ($(this).val() === '') {
                            isValid = false;
                            $(this).addClass('is-invalid'); // Add 'invalid' class if validation fails
                        } else {
                            $(this).removeClass('is-invalid'); // Remove 'invalid' class if validation passes
                        }
                    });
                    return isValid;
                }
                $(".next").click(function() {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    // Validate fields before proceeding
                    if (!validateFields()) {
                        alert("Please fill all required fields.");
                        return false; // Prevent moving to the next fieldset
                    }
                    // Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    // Show the next fieldset
                    next_fs.show();
                    // Hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fieldset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 600
                    });
                });
                $(".previous").click(function() {
                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();
                    // Remove class active
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                    // Show the previous fieldset
                    previous_fs.show();
                    // Hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fieldset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            previous_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 600
                    });
                });
                $('.radio-group .radio').click(function() {
                    $(this).parent().find('.radio').removeClass('selected');
                    $(this).addClass('selected');
                });
                $(".submit").click(function() {
                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();
                    if (!validateFields()) {
                        alert("Please fill all required fields.");
                        return false; // Prevent moving to the next fieldset
                    }
                    $(this).prop('disabled', true);
                    $.ajax({
                        type: 'POST',
                        url: $('#msform').attr('action'), // Change to your form's action URL
                        data: $('#msform').serialize(),
                        success: function(response) {
                            success_message = response.message;
                            $(".success_message").text(success_message);
                            // Add Class Active
                            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass(
                                "active");
                            // Show the next fieldset
                            next_fs.show();
                            // Hide the current fieldset with style
                            current_fs.animate({
                                opacity: 0
                            }, {
                                step: function(now) {
                                    // for making fieldset appear animation
                                    opacity = 1 - now;
                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({
                                        'opacity': opacity
                                    });
                                },
                                duration: 600
                            });
                        },
                        error: function(xhr) {
                            // Handle error here
                            var error = JSON.parse(xhr.responseText);
                            alert("An error occurred. Please try again.");
                            $(".submit").prop('disabled', false);
                        }
                    });
                    return false; // Prevent the default form submission
                });
                $(document).on('change', '#region_id', function(e) {
                    let region_id = $('option:selected', this).val();
                    if (region_id != undefined || region_id != null) {
                        let districtSelect = $(this).parent().parent().closest('div').find('#district_id');
                        districtSelect.empty().append('<option selected disabled>Searching...</option>');
                        $.ajax({
                            url: "{{ route('web.vendor.registration.fetch_districts') }}",
                            type: "GET",
                            data: {
                                region_id: region_id,
                            },
                            success: function(response) {
                                let districtData = response.data;
                                districtSelect.empty().append(
                                    '<option value="">Choose district</option>');
                                $.each(districtData, function(index, option) {
                                    districtSelect.append($('<option>', {
                                        value: option.id,
                                        text: option.name,
                                    }));
                                });
                            },
                            error: function(xhr) {
                                districtSelect.empty().append(
                                    '<option value="" selected disabled>Error</option>');
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
    <div class="contactbanner innerbanner">
        <div class="inner-breadcrumb">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12 ">
                        <h2 class="breadcrumb-title">Registration Form</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registration Form</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section ">
        <div class="container">
            <!-- MultiStep Form -->
            <div class="container-fluid" id="">
                <div class="card vendor-registration">
                    <div class="card-header">
                        <h2><strong>Vendor Registration Form</strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action="{{ route('web.vendor.registration.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Company Details</strong></li>
                                    <li id="personal"><strong>Company Address</strong></li>
                                    <li id="payment"><strong>Contact Person</strong></li>
                                    <li id="login"><strong>Login Details</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Company Details</h2>
                                        <div class="row">
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="company_type">Type of
                                                    organization</label>
                                                <select class="form-control select2" name="company_type"
                                                    id="company_type" required>
                                                    <option value="">Choose type</option>
                                                    <option value="soleProprietorship">Sole Proprietorship</option>
                                                    <option value="partnership">Partnership</option>
                                                    <option value="corporation">Corporation</option>
                                                    <option value="llc">Limited Liability Company (LLC)</option>
                                                    <option value="nonprofit">Nonprofit Organization</option>
                                                    <option value="jointVenture">Joint Venture</option>
                                                    <option value="governmentOwned">Government-Owned Corporation
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="company_name">Company
                                                    Name</label>
                                                <input type="text" class="form-control" id="company_name"
                                                    name="company_name" placeholder="Enter Company Name" required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="business_name">Business
                                                    Name</label>
                                                <input type="text" class="form-control" id="business_name"
                                                    name="business_name" placeholder="Enter Business Name" required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="company_category_id">Company
                                                    Category</label>
                                                <select class="form-control select2" name="company_category_id"
                                                    id="company_category_id" required>
                                                    <option value="">Choose Category</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="year_of_establishment">Year of Establishment</label>
                                                <input type="number" class="form-control" id="year_of_establishment"
                                                    name="year_of_establishment"
                                                    placeholder="Enter Year of Establishment" required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="number_of_employees">Number of
                                                    Employees</label>
                                                <input type="number" class="form-control" id="number_of_employees"
                                                    name="number_of_employees" placeholder="Enter Number of Employees"
                                                    required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="licence_number">Company /
                                                    Business
                                                    Registration Number</label>
                                                <input type="text" class="form-control" id="licence_number"
                                                    name="licence_number" placeholder="Enter Registration Number"
                                                    required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="tin_number">Tax Identification Number</label>
                                                <input type="text" class="form-control" id="tin_number"
                                                    name="tin_number" placeholder="Enter TIN">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next btn btn-primary"
                                        value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Contact & Address Information</h2>
                                        <div class="row">
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="company_phone">Company Phone Number</label>
                                                <input type="text" class="form-control" id="company_phone"
                                                    name="company_phone" placeholder="Enter Phone Number" required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="company_email">Company Email
                                                    Address</label>
                                                <input type="email" class="form-control" id="company_email"
                                                    name="company_email" placeholder="Enter Email Address" required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="website">Company Website</label>
                                                <input type="text" class="form-control" id="website"
                                                    name="website" placeholder="Enter Website">
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="country_id">Country</label>
                                                <select class="form-control select2" name="country_id"
                                                    id="country_id" required>
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $country->code == 'TZA' ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="region_id">Region</label>
                                                <select class="form-control select2 region_id" name="region_id"
                                                    id="region_id" required>
                                                    <option value="">Choose Region</option>
                                                    @foreach ($regions as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="district_id">District</label>
                                                <select class="form-control select2" name="district_id"
                                                    id="district_id" required>
                                                    <option value="">Choose District</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="street_address">Street Address</label>
                                                <input type="text" class="form-control" id="street_address"
                                                    name="street_address" placeholder="Enter Street Address">
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="physical_address">Physical
                                                    Address</label>
                                                <input type="text" class="form-control required"
                                                    id="physical_address" name="physical_address"
                                                    placeholder="Enter Physical Address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-secondary"
                                        value="Previous" />
                                    <input type="button" name="next" class="next btn btn-primary"
                                        value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Contact Person Details</h2>
                                        <div class="row">
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="contact_person_name">Contact Person
                                                    Name</label>
                                                <input type="text" class="form-control" id="contact_person_name"
                                                    name="contact_person_name"
                                                    placeholder="Enter Contact Person Name">
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="contact_person_title">Contact Person
                                                    Title</label>
                                                <input type="text" class="form-control" id="contact_person_title"
                                                    name="contact_person_title"
                                                    placeholder="Enter Contact Person Title">
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="contact_person_email">Contact Person
                                                    Email</label>
                                                <input type="email" class="form-control" id="contact_person_email"
                                                    name="contact_person_email"
                                                    placeholder="Enter Contact Person Email">
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label" for="contact_person_phone">Contact Person
                                                    Phone</label>
                                                <input type="tel" class="form-control" id="contact_person_phone"
                                                    name="contact_person_phone"
                                                    placeholder="Enter Contact Person Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-secondary"
                                        value="Previous" />
                                    <input type="button" class="next btn btn-primary" value="Next" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Login Details</h2>
                                        <div class="row">
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="login_email">Email
                                                    Address</label>
                                                <input type="text" class="form-control" id="login_email"
                                                    name="login_email" placeholder="Enter Email Address" required>
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter Password" required
                                                    autocomplete="new-password">
                                            </div>
                                            <div class="form-group mt-2 col-md-4">
                                                <label class="form-label required" for="password_confirmation">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control"
                                                    id="password_confirmation" name="password_confirmation" required
                                                    autocomplete="new-password" placeholder="Enter Password">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-secondary"
                                        value="Previous" />
                                    <input type="button" class="submit btn btn-primary" value="Submit" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2>
                                        <br><br>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-3 d-flex justify-content-center">
                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                    class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h6 class="success_message">You Have Successfully Register</h6>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-web-layout>
