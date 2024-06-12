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
                display: none;
            }

            #placeholder {
                position: absolute;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none;
            }
        </style>
    @endpush
    @push('scripts')
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
        <form class="needs-validation" id="form-submit" action="{{ route('admin.news.store') }}" method="POST"
            novalidate enctype="multipart/form-data">
            @csrf
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
                                        <img id="preview" src="">
                                        <div class="" id="placeholder">Browse Image</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="video_url" class="form-label">Video URL</label>
                                    <input type="text" class="form-control" name="video_url" id="video_url"
                                        placeholder="Enter video url" value="{{ old('video_url') }}" />
                                </div>

                                <div class="col-12">
                                    <label for="news_category" class="form-label required">Category</label>
                                    <select id="news_category" name="news_category[]" class="form-control select"
                                        required multiple>
                                        <option value="">Choose category</option>
                                        @foreach ($news_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="tags" class="form-label">Tags</label>

                                    <textarea id="tags" name="tags" class="form-control  @error('tags') is-invalid @enderror"
                                        placeholder="Separate tags by comma(,)" cols="10" rows="4">{{ old('tags') }}</textarea>
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
                                        value="{{ old('title') }}" required />
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
                                        id="short_description" cols="30" rows="2" required>{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label required">News Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote"
                                        cols="30" rows="10" required style="height: 200px">{{ old('description') }}</textarea>
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
