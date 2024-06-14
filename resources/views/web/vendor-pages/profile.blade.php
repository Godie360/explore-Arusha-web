<x-vendor-layout>
    <div class="profile-content">
        <div class="row dashboard-info">
            <div class="col-lg-9">
                <div class="card dash-cards">
                    <div class="card-header">
                        <h4>Profile Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('web.users.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                            <div class="profile-photo">
                                <div class="profile-img">
                                    <div class="settings-upload-img">
                                        <img src="{{ auth()->user()->profile_photo }}" alt="profile">
                                    </div>
                                    <div class="settings-upload-btn">
                                        <input type="file" accept="image/*" name="image"
                                            class="hide-input image-upload" id="file">
                                        <label for="file" class="file-upload">Upload New photo</label>
                                    </div>
                                    <span>Max file size: 5 MB</span>
                                </div>
                                <a href="javascript:void(0)" class="profile-img-del"><i class="feather-trash-2"></i></a>
                            </div>
                            <div class="profile-form">
                                <div class="row">
                                    <div class="form-set col-md-4">
                                        <label for="first_name" class="col-form-label">First Name</label>
                                        <div class="pass-group group-img">
                                            <span class="lock-icon"><i class="feather-user"></i></span>
                                            <input type="text" name="first_name" id="first_name"
                                                class="form-control  @error('first_name') is-invalid @enderror"
                                                value="{{ old('first_name', auth()->user()->first_name) }}" required>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-set col-md-4">
                                        <label for="middle_name" class="col-form-label">Middle Name</label>
                                        <div class="pass-group group-img">
                                            <span class="lock-icon"><i class="feather-user"></i></span>
                                            <input type="text" name="middle_name" id="middle_name"
                                                class="form-control  @error('middle_name') is-invalid @enderror"
                                                value="{{ old('middle_name', auth()->user()->middle_name) }}">
                                            @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-set col-md-4">
                                        <label for="last_name" class="col-form-label">Last Name</label>
                                        <div class="pass-group group-img">
                                            <span class="lock-icon"><i class="feather-user"></i></span>
                                            <input type="text" name="last_name" id="last_name"
                                                class="form-control  @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name', auth()->user()->last_name) }}" required>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-set">
                                            <label for="phone" class="col-form-label">Phone Number</label>
                                            <div class="pass-group group-img">
                                                <span class="lock-icon"><i class="feather-phone-call"></i></span>
                                                <input type="tel" name="phone" id="phone"
                                                    class="form-control  @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone', auth()->user()->phone) }}" required>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-set">
                                            <label for="email" class="col-form-label">Email Address</label>
                                            <div class="group-img">
                                                <i class="feather-mail"></i>
                                                <input type="email" name="email" id="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    value="{{ old('email', auth()->user()->email) }}" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-set">
                                            <label for="address" class="col-form-label">Street Address</label>
                                            <div class="group-img">
                                                <i class="feather-map-pin"></i>
                                                <input type="text" name="address" id="address"
                                                    class="form-control  @error('address') is-invalid @enderror"
                                                    value="{{ old('address', auth()->user()->address) }}" required>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-set">
                                            <label for="id_type_id" class="col-form-label">Id Type</label>
                                            <div class="group-img">
                                                <i class="fa-solid fa-id-card"></i>
                                                <select name="id_type_id" id="id_type_id"
                                                    class="form-control  @error('id_type_id ') is-invalid @enderror"
                                                    required>
                                                    <option value="">Select Id</option>
                                                    @foreach ($id_types as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('id_type_id ', auth()->user()->id_type_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('id_type_id ')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-set">
                                            <label for="id_number" class="col-form-label">Id Number</label>
                                            <div class="group-img">
                                                <i class="fa-solid fa-keyboard"></i>
                                                <input type="text" name="id_number" id="id_number"
                                                    class="form-control  @error('id_number ') is-invalid @enderror"
                                                    value="{{ old('id_number ', auth()->user()->id_number) }}"
                                                    required>
                                                @error('id_number ')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save Change</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="profile-sidebar">
                    <div class="card">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('web.users.change.password') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-set">
                                    <label class="col-form-label">Current Password</label>
                                    <div class="pass-group group-img">
                                        <span class="lock-icon"><i class="feather-lock"></i></span>
                                        <input type="password" name="current_password"
                                            class="form-control pass-input" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-set">
                                    <label class="col-form-label">New Password</label>
                                    <div class="pass-group group-img">
                                        <span class="lock-icon"><i class="feather-lock"></i></span>
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="toggle-password feather-eye-off"></span>
                                    </div>
                                </div>
                                <div class="form-set">
                                    <label class="col-form-label">Confirm New Password</label>
                                    <div class="pass-group group-img">
                                        <span class="lock-icon"><i class="feather-lock"></i></span>
                                        <input type="password" name="password_confirmation"
                                            class="form-control pass-input">
                                        <span class="toggle-password feather-eye-off"></span>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit"> Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-vendor-layout>
