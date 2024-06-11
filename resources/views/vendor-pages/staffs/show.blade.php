<x-vendor-layout>
    <div class="card">
        <div class="card-header">
            <h4>Staff Details</h4>
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $staff->first_name }}</p>
            <p><strong>Middle Name:</strong> {{ $staff->middle_name ?? 'N/A' }}</p>
            <p><strong>Last Name:</strong> {{ $staff->last_name }}</p>
            <p><strong>Email:</strong> {{ $staff->email }}</p>
            <p><strong>Phone:</strong> {{ $staff->phone }}</p>
            <p><strong>ID Number:</strong> {{ $staff->id_number }}</p>
            <p><strong>Address:</strong> {{ $staff->address }}</p>
            @if ($staff->image)
                <p><strong>Profile Image:</strong><br>
                    <img class="img-fluid avatar-img" src="{{ asset('storage/' . $staff->image) }}" alt="Profile Image">
                </p>
            @else
                <p><strong>Profile Image:</strong> N/A</p>
            @endif
        </div>
    </div>
</x-vendor-layout>
