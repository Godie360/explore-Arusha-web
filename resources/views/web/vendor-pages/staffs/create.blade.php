<x-vendor-layout>
    <div class="card">
        <div class="card-header">
            <h4>Add Staff</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('web.users.staff.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">First Name</label>
                        <input name="first_name" type="text" class="form-control pass-input" placeholder="First Name">
                    </div>
                    <div class="form-set">
                        <label class="col-form-label">Middle Name</label>
                        <input name="middle_name" type="text" class="form-control pass-input" placeholder="Middle Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Last Name</label>
                        <input name="last_name" type="text" class="form-control pass-input" placeholder="Last Name">
                    </div>
                    <div class="form-set">
                        <label class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control pass-input" placeholder="Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Phone</label>
                        <input name="phone" type="text" class="form-control pass-input" placeholder="Phone">
                    </div>
                    <div class="form-set">
                        <label class="col-form-label">ID Number</label>
                        <input name="id_number" type="text" class="form-control pass-input" placeholder="ID Number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Address</label>
                        <input name="address" type="text" class="form-control pass-input" placeholder="Address">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-set">
                        <label class="col-form-label">Profile Image</label>
                        <input name="profile_image" type="file" class="form-control pass-input">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-vendor-layout>
