<div class="table-actions d-flex">
    <a class="delete-table view-edit-button me-2" data-type="view" href="{{ route('admin.vendors.show', $data->id) }}">
        <img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="svg">
    </a>
    <a class="delete-table view-edit-button me-2" data-type="edit" href="{{ route('admin.vendors.edit', $data->id) }}">
        <img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="svg">
    </a>
    <a class="delete-table delete_button" href="{{ route('admin.vendors.destroy', $data->id) }}">
        <img src="{{ asset('admin/assets/img/icons/delete.svg') }}" alt="svg">
    </a>
</div>
