<x-web-layout>
    @push('styles')
    <style>
        .small-box {
            border-radius: 0.25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
            display: block;
            margin-bottom: 20px;
            position: relative;
            background-color: #04425a;
        }

        .small-box>.inner {
            padding: 10px;
        }

        .small-box h3 {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 0 0 10px;
            padding: 0;
            white-space: nowrap;
            color: #fff;
        }

        @media (min-width: 992px) {

            .col-xl-2 .small-box h3,
            .col-lg-2 .small-box h3,
            .col-md-2 .small-box h3 {
                font-size: 1.6rem;
            }

            .col-xl-3 .small-box h3,
            .col-lg-3 .small-box h3,
            .col-md-3 .small-box h3 {
                font-size: 1.6rem;
            }
        }

        @media (min-width: 1200px) {

            .col-xl-2 .small-box h3,
            .col-lg-2 .small-box h3,
            .col-md-2 .small-box h3 {
                font-size: 2.2rem;
            }

            .col-xl-3 .small-box h3,
            .col-lg-3 .small-box h3,
            .col-md-3 .small-box h3 {
                font-size: 2.2rem;
            }
        }

        .small-box p {
            font-size: 1rem;
            color: #fff;
        }

        .small-box p>small {
            color: #f8f9fa;
            display: block;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .small-box h3,
        .small-box p {
            z-index: 5;
        }

        .small-box .icon {
            color: rgba(0, 0, 0, 0.15);
            z-index: 0;
        }

        .small-box .icon>i {
            font-size: 90px;
            position: absolute;
            right: 15px;
            top: 15px;
            transition: -webkit-transform 0.3s linear;
            transition: transform 0.3s linear;
            transition: transform 0.3s linear, -webkit-transform 0.3s linear;
        }

        .small-box .icon>i.fa,
        .small-box .icon>i.fas,
        .small-box .icon>i.far,
        .small-box .icon>i.fab,
        .small-box .icon>i.fal,
        .small-box .icon>i.fad,
        .small-box .icon>i.ion {
            font-size: 70px;
            top: 20px;
        }

        .small-box:hover {
            text-decoration: none;
        }

        .small-box:hover .icon>i,
        .small-box:hover .icon>i.fas {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        @media (max-width: 767.98px) {
            .small-box {
                text-align: center;
            }

            .small-box .icon {
                display: none;
            }

            .small-box p {
                font-size: 12px;
            }
        }

        .complaint-container {
            margin: 50px auto;
        }

        .complaint-container .nav-tabs {
            border-bottom: 1px solid #04425a;
        }

        .complaint-container .nav-tabs .nav-link {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border: 0;
        }

        .complaint-container .nav-link {
            color: #04425a;
        }

        .complaint-container .nav-tabs .nav-link.active {
            background-color: #04425a;
            color: #fff;
        }
    </style>
    @endpush
    @push('scripts')
    @endpush
    <div class="contactbanner innerbanner">
        <div class="inner-breadcrumb">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12 ">
                        <h2 class="breadcrumb-title">Complaints</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Complaints</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="complaint-status">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $allComplaints }}</h3>
                                <p>Total Complaints
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-simple"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $complaintsThisMonthCount }}</h3>
                                <p>This Month Complaints
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-simple"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $completedComplaints }}</h3>
                                <p>Completed Complaints
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-simple"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="small-box">
                            <div class="inner">
                                <h3>{{ $pendingComplaints }}</h3>
                                <p>Pending Complaints
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chart-simple"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="complaint-container">
                <ul class="nav nav-tabs nav-fill" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="complaints-tab" data-bs-toggle="tab"
                            data-bs-target="#complaints" type="button" role="tab" aria-controls="complaints"
                            aria-selected="true">Complaint Form</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="suggestions-tab" data-bs-toggle="tab" data-bs-target="#suggestions"
                            type="button" role="tab" aria-controls="suggestions" aria-selected="false">Suggestion
                            Form</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="complaints" role="tabpanel"
                        aria-labelledby="complaints-tab">
                        <!-- Complaints Tab Content -->
                        <div class="container mt-3">
                            <div class="complaints-form">
                                <form action="{{ route('web.complaints.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="type" value="complaints">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Complaint Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class=" form-label required"
                                                            for="institution_id">Department</label>
                                                        <select class="form-control select2" name="institution_id"
                                                            id="institution_id" required>
                                                            <option>Choose Department</option>
                                                            @foreach ($institutions as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label required" for="complaint_type">Types of
                                                            Complaint</label>
                                                        <select class="form-control select2" name="complaint_type"
                                                            id="complaint_type" required>
                                                            <option value="">Choose type</option>
                                                            <option value="Harassment complaints">Harassment complaints
                                                            </option>
                                                            <option value="Corruption Complaints">Corruption complaints
                                                            </option>
                                                            <option value="Fraud complaints">Fraud complaints</option>
                                                            <option value="Discrimination complaints">Discrimination
                                                                complaints
                                                            </option>
                                                            <option value="Public health complaints">Public health
                                                                complaints
                                                            </option>
                                                            <option value="Consumer complaints">Consumer complaints
                                                            </option>
                                                            <option value="Neighborhood disputes">Neighborhood disputes
                                                            </option>
                                                            <option value="Education related complaints">
                                                                Education-related
                                                                complaints</option>
                                                            <option value="Employment related complaints">
                                                                Employment-related
                                                                complaints</option>
                                                            <option value="Criminal activity complaints">Criminal
                                                                activity
                                                                complaints</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="personal_responsible">Person
                                                            Responsible
                                                            (Optional)</label>
                                                        <input type="text" class="form-control"
                                                            id="personal_responsible" name="personal_responsible"
                                                            placeholder="Enter Person Responsible">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <label class=" form-label" for="description">Complaint
                                                            Description</label>
                                                        <textarea class="form-control" id="description"
                                                            name="description" rows="3"
                                                            placeholder="Enter Complaint Description"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4>Personal Information</h4>
                                            <small>NB: You may provide Your Contact Information if You wish to receive
                                                more details for this complaint
                                            </small>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="full_name">Full Name
                                                            (Optional)</label>
                                                        <input type="text" class="form-control" name="full_name"
                                                            id="full_name" placeholder="Enter Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="phone">Phone Number
                                                            (Optional)</label>
                                                        <input type="text" class="form-control" name="phone" id="phone"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="email">Email Address
                                                            (Optional)</label>
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="suggestions" role="tabpanel" aria-labelledby="suggestions-tab">
                        <!-- Suggestions Tab Content -->
                        <div class="container mt-3">
                            <div class="complaints-form">
                                <form action="{{ route('web.complaints.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="type" value="suggestions">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Suggestion Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label required"
                                                            for="sug_institution_id">Department</label>
                                                        <select class="form-control select2" name="institution_id"
                                                            id="sug_institution_id" required>
                                                            <option>Choose Department</option>
                                                            @foreach ($institutions as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label required"
                                                            for="sug_description">Suggestion
                                                            Description</label>
                                                        <textarea class="form-control" name="description"
                                                            id="sug_description" rows="3"
                                                            placeholder="Enter Complaint Description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4>Personal Information</h4>
                                            <small>NB: You may provide Your Contact Information if You wish to receive
                                                more details for this suggestion
                                            </small>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="sug_full_name">Full Name
                                                            (Optional)</label>
                                                        <input type="text" class="form-control" name="full_name"
                                                            id="sug_full_name" placeholder="Enter Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="sug_phone">Phone Number
                                                            (Optional)</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            id="sug_phone" placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-2">
                                                        <label class="form-label" for="sug_email">Email Address
                                                            (Optional)</label>
                                                        <input type="email" class="form-control" name="email"
                                                            id="sug_email" placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
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
</x-web-layout>
