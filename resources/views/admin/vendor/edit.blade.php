<x-admin-layout>
    <div class="content">
        <div class="content-page-header content-page-headersplit">
            <h5>Edit Vendor</h5>
        </div>
        <div class="row">
            <div class="col-lg-12 m-auto">
                <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul id="progressbar">
                        <li class="active">
                            <div class="multi-step-info">
                                <h6>Company Details</h6>
                            </div>
                            <div class="multi-step-icon">
                                <span><i class="fa-solid fa-building"></i></span>
                            </div>
                        </li>
                        <li>
                            <div class="multi-step-info">
                                <h6>Company Address</h6>
                            </div>
                            <div class="multi-step-icon">
                                <span><i class="fa-solid fa-address-book"></i></span>
                            </div>
                        </li>
                        <li>
                            <div class="multi-step-info">
                                <h6>Contact Person</h6>
                            </div>
                            <div class="multi-step-icon">
                                <span><i class="fa-solid fa-user"></i></span>
                            </div>
                        </li>
                        <li>
                            <div class="multi-step-info">
                                <h6>Validation</h6>
                            </div>
                            <div class="multi-step-icon">
                                <span><i class="fa-solid fa-check"></i></span>
                            </div>
                        </li>
                    </ul>
                    <fieldset id="first-field">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-set">
                                    <label for="company_type">Type of organization</label>
                                    <select class="select" name="company_type" id="company_type" required>
                                        <option value="">Choose type</option>
                                        <option value="soleProprietorship"
                                            {{ $vendor->company_type == 'soleProprietorship' ? 'selected' : '' }}>Sole
                                            Proprietorship</option>
                                        <option value="partnership"
                                            {{ $vendor->company_type == 'partnership' ? 'selected' : '' }}>Partnership
                                        </option>
                                        <option value="corporation"
                                            {{ $vendor->company_type == 'corporation' ? 'selected' : '' }}>Corporation
                                        </option>
                                        <option value="llc" {{ $vendor->company_type == 'llc' ? 'selected' : '' }}>
                                            Limited Liability Company (LLC)</option>
                                        <option value="nonprofit"
                                            {{ $vendor->company_type == 'nonprofit' ? 'selected' : '' }}>Nonprofit
                                            Organization</option>
                                        <option value="jointVenture"
                                            {{ $vendor->company_type == 'jointVenture' ? 'selected' : '' }}>Joint
                                            Venture
                                        </option>
                                        <option value="governmentOwned"
                                            {{ $vendor->company_type == 'governmentOwned' ? 'selected' : '' }}>
                                            Government-Owned Corporation
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Company Name</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="company_name"
                                        value="{{ old('company_name', $vendor->company_name) }}"
                                        placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Business Name</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="business_name"
                                        value="{{ old('business_name', $vendor->business_name) }}"
                                        placeholder="Business Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-set">
                                    <label for="company_category_id">Company Category</label>
                                    <select class="select" name="company_category_id" id="company_category_id" required>
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $vendor->company_category_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Year of Establishment</h6>
                                </div>
                                <div class="form-set">
                                    <input type="number" class="form-control" name="year_of_establishment"
                                        value="{{ old('year_of_establishment', $vendor->year_of_establishment) }}"
                                        placeholder="Enter Year of Establishment">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Number of Employees</h6>
                                </div>
                                <div class="form-set">
                                    <input type="number" class="form-control" name="number_of_employees"
                                        value="{{ old('number_of_employees', $vendor->number_of_employees) }}"
                                        placeholder="Enter Number of Employees">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Company / Business Registration Number</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="licence_number"
                                        value="{{ old('licence_number', $vendor->licence_number) }}"
                                        placeholder="Enter Registration Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Tax Identification Number</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="tin_number"
                                        value="{{ old('tin_number', $vendor->tin_number) }}" placeholder="Enter TIN">
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                            <div class="form-set">
                                <label>Base</label>
                                <div id="editor"></div>
                            </div>
                        </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-btns">
                                    <button class="btn btn-submit next_btn" type="button">Next <i
                                            class="fe fe-arrow-right ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title mb-3 text-center">Contact & Address Information</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Company Phone Number</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="company_phone"
                                        value="{{ old('company_phone', $vendor->company_phone) }}"
                                        placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Company Email
                                        Address</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="company_email"
                                        value="{{ old('company_email', $vendor->company_email) }}"
                                        placeholder="Enter Email Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Company Website</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="website"
                                        value="{{ old('website', $vendor->website) }}" placeholder="Enter Website ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-set">
                                    <label for="country_id">Country</label>
                                    <select class="select" name="country_id" id="country_id" required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $country->id == $vendor->country_id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-set">
                                    <label for="region_id">Region</label>
                                    <select class="select" name="region_id" id="region_id" required>
                                        <option value="">Choose Region</option>
                                        @foreach ($regions as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $vendor->region_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-set">
                                    <label for="district_id">District</label>
                                    <select class="select" name="district_id" id="district_id" required>
                                        <option value="">Choose District</option>
                                        @foreach ($districts as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $vendor->district_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Street Address</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="street_address"
                                        value="{{ old('street_address', $vendor->street_address) }}"
                                        placeholder="Enter Street Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Physical Address</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="physical_address"
                                        value="{{ old('physical_address', $vendor->physical_address) }}"
                                        placeholder="Enter Physical Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-btns">
                                    <button class="btn btn-submit next_btn" type="button">Next <i
                                            class="fe fe-arrow-right ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title mb-3 text-center">Contact Person Details</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Contact Person Name</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="contact_person_name"
                                        value="{{ old('contact_person_name', $vendor->contact_person_name) }}"
                                        placeholder="Enter Contact Person Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Contact Person Title</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="contact_person_title"
                                        value="{{ old('contact_person_title', $vendor->contact_person_title) }}"
                                        placeholder="Enter Contact Person Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Contact Person Email</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="contact_person_email"
                                        value="{{ old('contact_person_email', $vendor->contact_person_email) }}"
                                        placeholder="Enter Contact Person Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sub-title">
                                    <h6>Contact Person Phone</h6>
                                </div>
                                <div class="form-set">
                                    <input type="text" class="form-control" name="contact_person_phone"
                                        value="{{ old('contact_person_phone', $vendor->contact_person_phone) }}"
                                        placeholder="Enter Contact Person Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-btns">
                                    <button class="btn btn-submit next_btn" type="button">Next <i
                                            class="fe fe-arrow-right ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title mb-3 text-center">Validation</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-set">
                                    <label for="status">Company Status</label>
                                    <select class="select" name="status" id="status" required>
                                        <option value="">Choose Status</option>
                                        @foreach (CompanyStatusEnum::cases() as $item)
                                            <option value="{{ $item->value }}"
                                                {{ $vendor->status->value == $item->value ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field-btns">
                            <button class="btn btn-submit " type="submit">Save changes <i
                                    class="fe fe-arrow-right ms-1"></i></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
