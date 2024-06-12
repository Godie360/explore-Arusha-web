<div class="table-actions d-flex">
    <a class="delete-table view_button me-2" href="{{ route('admin.news.show', $data->id) }}">
        <img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="svg">
    </a>
    <a class="delete-table edit_button me-2" href="{{ route('admin.news.edit', $data->id) }}">
        <img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="svg">
    </a>
    <a class="delete-table delete_button" href="{{ route('admin.news.destroy', $data->id) }}">
        <img src="{{ asset('admin/assets/img/icons/delete.svg') }}" alt="svg">
    </a>
</div>
