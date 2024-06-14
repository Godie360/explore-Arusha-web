<x-vendor-layout>
    <div class="dash-listingcontent dashboard-info">
        <div class="dash-cards card">
            <div class="card-header">
                <h4>My Listings</h4>
                <a class="nav-link add-listing" href="{{route('web.users.staff.create')}}"">
                    <span><i class="fa-solid fa-plus"></i></span>Add Staff
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="listing-table datatable" id="listdata-table">
                        <thead>
                            <tr>
                                <th class="no-sort">Profile Image</th>
                                <th class="no-sort">First Name</th>
                                <th class="no-sort">Middle Name</th>
                                <th class="no-sort">Last Name</th>
                                <th class="no-sort">Id Number</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>
                                        <div class="listingtable-img">
                                            <a href="{{ route('web.users.staff.show', $staff->id) }}">
                                                <img class="img-fluid avatar-img" src="{{ asset('storage/' . $staff->image) }}" alt="Profile Image">
                                            </a>
                                        </div>

                                    </td>
                                    <td>{{ $staff->first_name }}</td>
                                    <td>{{ $staff->middle_name }}</td>
                                    <td>{{ $staff->last_name }}</td>
                                    <td>{{ $staff->id_number }}</td>
                                    <td>
                                        <div class="action">
                                            <a href="{{ route('web.users.staff.show', $staff->id) }}" class="action-btn btn-view"><i class="feather-eye"></i></a>
                                            <a href="{{ route('web.users.staff.edit', $staff->id) }}" class="action-btn btn-edit"><i class="feather-edit-3"></i></a>
                                            <form action="{{ route('web.users.staff.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn btn-trash" onclick="return confirm('Are you sure you want to delete this staff?');">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="blog-pagination">
                    <nav>
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            @if ($staffs->onFirstPage())
                                <li class="page-item disabled previtem">
                                    <span class="page-link"><i class="fas fa-regular fa-arrow-left"></i> Prev</span>
                                </li>
                            @else
                                <li class="page-item previtem">
                                    <a class="page-link" href="{{ $staffs->previousPageUrl() }}"><i class="fas fa-regular fa-arrow-left"></i> Prev</a>
                                </li>
                            @endif

                            <!-- Pagination Numbers -->
                            <li class="justify-content-center pagination-center">
                                <div class="pagelink">
                                    <ul>
                                        @foreach ($staffs->getUrlRange(1, $staffs->lastPage()) as $page => $url)
                                            <li class="page-item {{ $staffs->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                            <!-- Next Page Link -->
                            @if ($staffs->hasMorePages())
                                <li class="page-item nextlink">
                                    <a class="page-link" href="{{ $staffs->nextPageUrl() }}">Next <i class="fas fa-regular fa-arrow-right"></i></a>
                                </li>
                            @else
                                <li class="page-item disabled nextlink">
                                    <span class="page-link">Next <i class="fas fa-regular fa-arrow-right"></i></span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-vendor-layout>
