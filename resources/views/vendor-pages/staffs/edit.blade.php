<x-vendor-layout>
    <div class="card">
        <div class="card-header">
            <h4>Edit Staff</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('web.users.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">First Name</label>
                        <input name="first_name" type="text" class="form-control pass-input" placeholder="First Name" value="{{ $staff->first_name }}">
                    </div>
                    <div class="form-set">
                        <label class="col-form-label">Middle Name</label>
                        <input name="middle_name" type="text" class="form-control pass-input" placeholder="Middle Name" value="{{ $staff->middle_name }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Last Name</label>
                        <input name="last_name" type="text" class="form-control pass-input" placeholder="Last Name" value="{{ $staff->last_name }}">
                    </div>
                    <div class="form-set">
                        <label class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control pass-input" placeholder="Email" value="{{ $staff->email }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Phone</label>
                        <input name="phone" type="text" class="form-control pass-input" placeholder="Phone" value="{{ $staff->phone }}">
                    </div>
                    <div class="form-set">
                        <label class="col-form-label">ID Number</label>
                        <input name="id_number" type="text" class="form-control pass-input" placeholder="ID Number" value="{{ $staff->id_number }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Address</label>
                        <input name="address" type="text" class="form-control pass-input" placeholder="Address" value="{{ $staff->address }}">
                    </div>
                </div>
                <!-- Profile Image Input Field -->
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Profile Image</label>
                        <input name="image" type="file" class="form-control pass-input">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-vendor-layout>
