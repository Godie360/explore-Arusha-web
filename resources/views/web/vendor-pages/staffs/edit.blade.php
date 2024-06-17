<x-vendor-layout>
    <div class="card">
        <div class="card-header">
            <h4>Edit Staff</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('web.users.staffs.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="staff_type_id">Staff Type</label>
                            <select name="staff_type_id" id="staff_type_id"
                                class="form-control @error('staff_type_id') is-invalid @enderror" required>
                                <option value="">Select Type</option>
                                @foreach ($staff_types as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $staff->staff_type_id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('staff_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="first_name">First Name</label>
                            <input name="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', @$staff->first_name) }}" placeholder="Enter First Name"
                                required>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label" for="middle_name">Middle Name</label>
                            <input name="middle_name" type="text"
                                class="form-control @error('middle_name') is-invalid @enderror"
                                value="{{ old('middle_name', @$staff->middle_name) }}" placeholder="Enter Middle Name">
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="last_name">Last Name</label>
                            <input name="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', @$staff->last_name) }}" placeholder="Enter Last Name"
                                required>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="phone">Phone Number</label>
                            <input name="phone" type="tel"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', @$staff->phone) }}" placeholder="Enter Phone Number" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="email">Email Address</label>
                            <input name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', @$staff->email) }}" placeholder="Enter Email Address" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="date_of_birth">Date of Birth</label>
                            <input name="date_of_birth" type="date"
                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth', @$staff->date_of_birth->format('Y-m-d')) }}" required>
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="gender">Gender</label>
                            <select name="gender" id="gender"
                                class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="">Select Gender</option>
                                @foreach (GenderEnum::cases() as $item)
                                    <option value="{{ $item->value }}"
                                        {{ $item->value == $staff->gender->value ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="country_id">Nationality</label>
                            <select name="country_id" id="country_id"
                                class="form-control @error('country_id') is-invalid @enderror" required>
                                <option value="">Select Country</option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $staff->country_id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="education">Education</label>
                            <input name="education" type="text"
                                class="form-control @error('education') is-invalid @enderror"
                                value="{{ old('education', @$staff->education) }}" placeholder="Enter Education">
                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="id_type_id">ID Type</label>
                            <select name="id_type_id" id="id_type_id"
                                class="form-control @error('id_type_id') is-invalid @enderror" required>
                                <option value="">Select ID Type</option>
                                @foreach ($id_types as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $staff->id_type_id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="id_number">ID Number</label>
                            <input name="id_number" type="text"
                                class="form-control @error('id_number') is-invalid @enderror"
                                value="{{ old('id_number', @$staff->id_number) }}" placeholder="Enter ID Number"
                                required>
                            @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="address">Street Address</label>
                            <input name="address" type="text"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address', @$staff->address) }}" placeholder="Enter Street Address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label" for="profile_photo">Profile Photo</label>
                            <input name="profile_photo" type="file"
                                class="form-control @error('profile_photo') is-invalid @enderror"
                                {{ $staff->profile_photo_path ? '' : 'required' }}>
                            @error('profile_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="status">Status</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">Select status</option>
                                @foreach (CompanyStatusEnum::cases() as $item)
                                    <option value="{{ $item->value }}"
                                        {{ $item->value == $staff->status->value ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-row col-md-6">
                        <div class="form-set">
                            <label class="col-form-label" for="bio">Biography</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Enter Biography">{{ old('bio', @$staff->bio) }}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-6">
                        <div class="form-set">
                            <label class="col-form-label" for="work_experience">Work Experience</label>
                            <textarea name="work_experience" class="form-control @error('work_experience') is-invalid @enderror"
                                placeholder="Enter Work Experience">{{ old('work_experience', @$staff->work_experience) }}</textarea>
                            @error('work_experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</x-vendor-layout>
