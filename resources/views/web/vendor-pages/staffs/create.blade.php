<x-vendor-layout>
    <div class="card">
        <div class="card-header">
            <h4>Add Staff</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('web.users.staffs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="first_name">First Name</label>
                            <input name="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" placeholder="Enter First Name" required>
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
                                value="{{ old('middle_name') }}" placeholder="Enter Middle Name">
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
                                value="{{ old('last_name') }}" placeholder="Enter Last Name" required>
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
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                placeholder="Enter Phone Number" required>
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
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="Enter Email Address" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="id_type_id">Id Type</label>
                            <select name="id_type_id" id="id_type_id"
                                class="form-control  @error('id_type_id ') is-invalid @enderror" required>
                                <option value="">Select Id</option>
                                @foreach ($id_types as $item)
                                    <option value="{{ $item->id }}">
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
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="id_number">Id Number</label>
                            <input name="id_number" type="text"
                                class="form-control @error('id_number') is-invalid @enderror"
                                value="{{ old('id_number') }}" placeholder="Enter Id Number" required>
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
                                value="{{ old('address') }}" placeholder="Enter Street Address" required>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label">Address</label>
                            <input name="address" type="text" class="form-control pass-input"
                                placeholder="Address">
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label">Profile Image</label>
                            <input name="profile_image" type="file" class="form-control pass-input">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-vendor-layout>
