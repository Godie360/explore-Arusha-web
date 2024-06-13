<x-admin-layout>
    @push('styles')
        <style>
            .file-input-wrapper {
                position: relative;
                width: 200px;
                height: 200px;
                border: 2px dashed #ccc;
                border-radius: 10px;
                overflow: hidden;
                background-size: cover;
                background-position: center;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #aaa;
                font-size: 18px;
                text-align: center;
            }

            .file-input-wrapper input[type="file"] {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                opacity: 0;
                cursor: pointer;
            }

            #preview {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            #placeholder {
                position: absolute;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none;
                display: none;
            }

            .multiple-image-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, 100px);
                gap: 5px;
                padding-right: 10px;
            }

            .image-card {
                position: relative;
                width: 100px;
                height: 100px;
                overflow: hidden;
                border-radius: 10px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                cursor: grab;
                /* Change cursor to indicate draggable */
            }

            .image-card img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 10px;
            }

            .delete-icon {
                position: absolute;
                top: 5px;
                right: 5px;
                width: 20px;
                height: 20px;
                color: #fff;
                background-color: rgba(255, 0, 0);
                border-radius: 50%;
                padding: 5px;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .image-card.dragging-over {
                border: 2px dashed #007bff;
                /* Example dashed border */
            }

            .featured-photo-title {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                text-align: center;
                color: gold;
                font-weight: bold;
                z-index: 1;
                background-color: white;
                border-radius: 10px;
                padding: 5px;
                box-sizing: border-box;
                font-size: 10px;
                display: none;
            }

            .featured-photo-border {
                border: 2px solid gold;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function() {
                var dataTransfer = new DataTransfer();
                $('#attachments').on('change', function(event) {
                    var files = event.target.files;
                    var container = $('.multiple-image-container');
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        // Check for duplicates
                        var isDuplicate = false;
                        for (var j = 0; j < dataTransfer.items.length; j++) {
                            var existingFile = dataTransfer.items[j].getAsFile();
                            if (existingFile.name === file.name && existingFile.size === file.size &&
                                existingFile.type === file.type) {
                                isDuplicate = true;
                                break;
                            }
                        }
                        if (!isDuplicate) {
                            dataTransfer.items.add(file);
                            var reader = new FileReader();
                            reader.onload = (function(file) {
                                return function(e) {
                                    // Find the first empty image card
                                    var imgCard = $('.image-card img[src=""]').first().closest(
                                        '.image-card');
                                    // If no empty image card is found, create a new one
                                    if (imgCard.length === 0) {
                                        imgCard = $('<div>', {
                                            class: 'image-card'
                                        });
                                        container.append(imgCard);
                                    }
                                    var img = imgCard.find('img');
                                    if (img.length === 0) {
                                        img = $('<img>', {
                                            src: e.target.result,
                                            alt: file.name
                                        });
                                        imgCard.append(img);
                                    } else {
                                        img.attr('src', e.target.result);
                                        img.attr('alt', file.name);
                                    }
                                    var deleteIcon = imgCard.find('.delete-icon');
                                    if (deleteIcon.length === 0) {
                                        deleteIcon = $('<i>', {
                                            class: 'fe fe-trash delete-icon'
                                        });
                                        imgCard.prepend(deleteIcon);
                                    }
                                    deleteIcon.off('click').on('click', function() {
                                        for (var j = 0; j < dataTransfer.items
                                            .length; j++) {
                                            if (dataTransfer.items[j].getAsFile() ===
                                                file) {
                                                dataTransfer.items.remove(j);
                                                break;
                                            }
                                        }
                                        $('#attachments')[0].files = dataTransfer.files;
                                        imgCard.remove();
                                    });
                                };
                            })(file);
                            reader.readAsDataURL(file);
                        }
                    }
                    // Update the input element with the new DataTransfer object
                    $('#attachments')[0].files = dataTransfer.files;
                });
                var $firstImageCardWithBorder = $(".multiple-image-container .image-card.featured-photo-border")
                    .first();
                var $featuredTitle = $(".featured-photo-title").detach();
                $(".multiple-image-container").sortable({
                    items: '.image-card',
                    cursor: 'grabbing',
                    tolerance: 'pointer',
                    containment: 'parent',
                    axis: 'x',
                    start: function(event, ui) {
                        $(".multiple-image-container .image-card").removeClass('featured-photo-border');
                        $firstImageCardWithBorder.addClass('featured-photo-border');
                    },
                    over: function(event, ui) {
                        $(ui.item).addClass('dragging-over');
                    },
                    out: function(event, ui) {
                        $(ui.item).removeClass('dragging-over');
                    },
                    update: function(event, ui) {
                        var $firstImageCard = $(".multiple-image-container .image-card").first();
                        $featuredTitle.appendTo($firstImageCard);
                        $firstImageCardWithBorder.removeClass('featured-photo-border');
                        $firstImageCard.addClass('featured-photo-border');
                    }
                });

                // Handle deletion for initial image cards with data-file-id
                $('.delete-icon').on('click', function() {
                    var imgCard = $(this).closest('.image-card');
                    var fileId = $(this).data('file-id');
                    if (fileId) {

                        const deleteDataLink = "{{ route('admin.galleries.file_delete') }}";
                        const token = $('meta[name="csrf-token"]').attr('content');
                        Swal.fire({
                            text: "Are you sure you want to delete this image?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                $.ajax({
                                    "url": deleteDataLink,
                                    "type": "POST",
                                    data: {
                                        _token: token,
                                        _method: "DELETE",
                                        fileId: fileId
                                    },
                                    success: function(response) {
                                        imgCard.remove();
                                        Swal.fire({
                                            icon: "success",
                                            title: "Data deleted successfuly.",
                                            text: response.message,
                                        });
                                    },
                                    error: function(xhr) {
                                        var error = JSON.parse(xhr.responseText);
                                        Swal.fire({
                                            icon: "error",
                                            title: "Oops...",
                                            text: error.message,
                                        });
                                    }
                                });
                            }
                        });






                    } else {
                        var imgSrc = imgCard.find('img').attr('src');
                        if (imgSrc) {
                            for (var j = 0; j < dataTransfer.items.length; j++) {
                                var file = dataTransfer.items[j].getAsFile();
                                var reader = new FileReader();
                                reader.onload = (function(file, imgSrc) {
                                    return function(e) {
                                        if (e.target.result === imgSrc) {
                                            dataTransfer.items.remove(j);
                                            $('#attachments')[0].files = dataTransfer.files;
                                            imgCard.remove();
                                        }
                                    };
                                })(file, imgSrc);
                                reader.readAsDataURL(file);
                            }
                        }
                    }
                });
            });
            $(document).on('submit', 'form#form-submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(this);
                form.find('button[type="submit"]').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    url: $(this).attr('action'),
                    success: function(response) {
                        form.find('button[type="submit"]').prop('disabled', false);
                        Swal.fire({
                            icon: "success",
                            title: "Done.",
                            text: response.message,
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 5000);
                    },
                    error: function(xhr) {
                        var error = JSON.parse(xhr.responseText);
                        form.find('button[type="submit"]').prop('disabled', false);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: error.message,
                        });
                    }
                });
            });
        </script>
    @endpush
    <div class="content">
        <form class="needs-validation" id="form-submit" action="{{ route('admin.galleries.update', $gallery->id) }}"
            method="POST" novalidate enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <div class="content-page-header">
                <h5>Edit Gallery</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row g-3 ">
                        <div class="col-12">
                            <label for="name" class="form-label required">Gallery Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="Enter Gallery Name"
                                value="{{ old('name', $gallery->name) }}" required />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label required">Gallery Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote"
                                cols="30" rows="10" required style="height: 200px">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="attachments" class="form-label required">Addition Images</label>
                            <input type="file" class="form-control" name="attachments[]" id="attachments"
                                placeholder="Enter featured image" value="{{ old('attachments') }}" required multiple />
                        </div>
                        <div class="col-12">
                            <div class="multiple-image-container">
                                @foreach ($gallery->files as $key => $file)
                                    <div class="image-card {{ $key === 0 ? 'featured-photo-border' : '' }}">
                                        @if ($key === 0)
                                            <div class="featured-photo-title">Featured Photo</div>
                                        @endif
                                        <i class="fe fe-trash delete-icon" data-file-id="{{ $file->id }}"></i>
                                        <img src="{{ $file->file }}" alt="Image 1">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="btn-path">
                                <a href="javascript:void(0);" class="btn btn-cancel me-3">Cancel</a>
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
