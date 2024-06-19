<div class="action">
    <a href="{{ route('web.users.services.show', $data->id) }}" class="action-btn btn-edit view-edit-button"
        data-type="view"><i class="feather-eye"></i></a>
    <a href="{{ route('web.users.services.edit', $data->id) }}" class="action-btn btn-edit view-edit-button"
        data-type="edit"><i class="feather-edit-3"></i></a>
    <a href="{{ route('web.users.services.destroy', $data->id) }}" class="action-btn btn-trash delete_button"><i
            class="feather-trash-2"></i></a>
</div>
