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
                $('#futured_file').on('change', function(event) {
                    var file = event.target.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#preview').attr('src', e.target.result).show();
                            $('#placeholder').hide();
                            $('#fileInputWrapper').css('background-image', 'none');
                        }
                        reader.readAsDataURL(file);
                    }
                });
                var dataTransfer = new DataTransfer();
                $('#images').on('change', function(event) {
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
                                    var imgCard = $('<div>', {
                                        class: 'image-card'
                                    });
                                    var img = $('<img>', {
                                        src: e.target.result,
                                        alt: file.name
                                    });
                                    var deleteIcon = $('<i>', {
                                        class: 'fe fe-trash delete-icon'
                                    });
                                    deleteIcon.on('click', function() {
                                        for (var j = 0; j < dataTransfer.items
                                            .length; j++) {
                                            if (dataTransfer.items[j].getAsFile() ===
                                                file) {
                                                dataTransfer.items.remove(j);
                                                break;
                                            }
                                        }
                                        $('#images')[0].files = dataTransfer.files;
                                        imgCard.remove();
                                    });
                                    imgCard.append(deleteIcon);
                                    imgCard.append(img);
                                    container.append(imgCard);
                                };
                            })(file);
                            reader.readAsDataURL(file);
                        }
                    }
                    // Update the input element with the new DataTransfer object
                    $('#images')[0].files = dataTransfer.files;
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
            });
            $(document).on('submit', 'form#form-submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(this);
                console.log(formData);
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
        <form class="needs-validation" id="form-submit" action="{{ route('admin.news.update', $news->id) }}" method="POST"
            novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <div class="content-page-header">
                <h5>Add News</h5>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3 ">
                                <div class="col-12">
                                    <label for="futured_file" class="form-label required">Featured Image</label>
                                    <div class="file-input-wrapper" id="fileInputWrapper">
                                        <input type="file" id="futured_file" name="futured_file">
                                        <img id="preview" src="{{ $news->featured_image }}">
                                        <div class="" id="placeholder">Browse Image</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="video_url" class="form-label">Video URL</label>
                                    <input type="text" class="form-control" name="video_url" id="video_url"
                                        placeholder="Enter video url"
                                        value="{{ old('video_url', $news->video_url) }}" />
                                </div>
                                <div class="col-12">
                                    <label for="news_category" class="form-label required">Category</label>
                                    <select id="news_category" name="news_category[]" class="form-control select"
                                        required multiple>
                                        <option value="">Choose category</option>
                                        @foreach ($news_categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ in_array($category->id, old('news_category', $news->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="tags" class="form-label">Tags</label>
                                    <textarea id="tags" name="tags" class="form-control  @error('tags') is-invalid @enderror"
                                        placeholder="Separate tags by comma(,)" cols="10" rows="4">{{ old('tags', $news->tag_names) }}</textarea>
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3 ">
                                <div class="col-12">
                                    <label for="title" class="form-label required">News Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" placeholder="Enter News Title"
                                        value="{{ old('title', @$news->detail->title) }}" required />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="short_description" class="form-label required">News Short
                                        Description</label>
                                    <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror"
                                        id="short_description" cols="30" rows="2" required>{{ old('short_description', @$news->detail->short_description) }}</textarea>
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label required">News Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote"
                                        cols="30" rows="10" required style="height: 200px">{{ old('description', @$news->detail->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="images" class="form-label required">Addition Images</label>
                                    <input type="file" class="form-control" name="images[]" id="images"
                                        placeholder="Enter featured image" value="{{ old('images') }}" required
                                        multiple />
                                </div>
                                <div class="col-12">
                                    <div class="multiple-image-container">
                                        @foreach ($news->files as $key => $file)
                                            <div class="image-card {{ $key === 0 ? 'featured-photo-border' : '' }}">
                                                @if ($key === 0)
                                                    <div class="featured-photo-title">Featured Photo</div>
                                                @endif
                                                <i class="fe fe-trash delete-icon"></i>
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
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
