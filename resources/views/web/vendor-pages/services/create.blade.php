<x-vendor-layout>
    @push('scripts')
        <script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script>
        <script>
            $(document).ready(function() {
                if ($("#description").length > 0) {
                    CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
                        toolbar: {
                            items: [
                                'findAndReplace', 'selectAll', '|',
                                'heading', '|',
                                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript',
                                'superscript',
                                'removeFormat', '|',
                                'bulletedList', 'numberedList', 'todoList', '|',
                                'outdent', 'indent', '|',
                                'undo', 'redo',
                                '-',
                                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight',
                                '|',
                                'alignment', '|',
                                'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed',
                                'codeBlock',
                                'htmlEmbed', '|',
                                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                            ],
                            shouldNotGroupWhenFull: true
                        },

                        list: {
                            properties: {
                                styles: true,
                                startIndex: true,
                                reversed: true
                            }
                        },
                        heading: {
                            options: [{
                                    model: 'paragraph',
                                    title: 'Paragraph',
                                    class: 'ck-heading_paragraph'
                                },
                                {
                                    model: 'heading1',
                                    view: 'h1',
                                    title: 'Heading 1',
                                    class: 'ck-heading_heading1'
                                },
                                {
                                    model: 'heading2',
                                    view: 'h2',
                                    title: 'Heading 2',
                                    class: 'ck-heading_heading2'
                                },
                                {
                                    model: 'heading3',
                                    view: 'h3',
                                    title: 'Heading 3',
                                    class: 'ck-heading_heading3'
                                },
                                {
                                    model: 'heading4',
                                    view: 'h4',
                                    title: 'Heading 4',
                                    class: 'ck-heading_heading4'
                                },
                                {
                                    model: 'heading5',
                                    view: 'h5',
                                    title: 'Heading 5',
                                    class: 'ck-heading_heading5'
                                },
                                {
                                    model: 'heading6',
                                    view: 'h6',
                                    title: 'Heading 6',
                                    class: 'ck-heading_heading6'
                                }
                            ]
                        },
                        placeholder: 'Write your description!',
                        fontFamily: {
                            options: [
                                'default',
                                'Arial, Helvetica, sans-serif',
                                'Courier New, Courier, monospace',
                                'Georgia, serif',
                                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                'Tahoma, Geneva, sans-serif',
                                'Times New Roman, Times, serif',
                                'Trebuchet MS, Helvetica, sans-serif',
                                'Verdana, Geneva, sans-serif'
                            ],
                            supportAllValues: true
                        },
                        fontSize: {
                            options: [10, 12, 14, 'default', 18, 20, 22],
                            supportAllValues: true
                        },

                        htmlSupport: {
                            allow: [{
                                name: /.*/,
                                attributes: true,
                                classes: true,
                                styles: true
                            }]
                        },
                        htmlEmbed: {
                            showPreviews: false
                        },
                        link: {
                            decorators: {
                                addTargetToExternalLinks: true,
                                defaultProtocol: 'https://',
                                toggleDownloadable: {
                                    mode: 'manual',
                                    label: 'Downloadable',
                                    attributes: {
                                        download: 'file'
                                    }
                                }
                            }
                        },
                        mention: {
                            feeds: [{
                                marker: '@',
                                feed: [
                                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy',
                                    '@canes',
                                    '@chocolate', '@cookie', '@cotton', '@cream',
                                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake',
                                    '@gingerbread',
                                    '@gummi', '@ice', '@jelly-o',
                                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum',
                                    '@pudding',
                                    '@sesame', '@snaps', '@soufflé',
                                    '@sugar', '@sweet', '@topping', '@wafer'
                                ],
                                minimumCharacters: 1
                            }]
                        },
                        removePlugins: [

                            'AIAssistant',
                            'CKBox',
                            'CKFinder',
                            'EasyImage',
                            'MultiLevelList',
                            'RealTimeCollaborativeComments',
                            'RealTimeCollaborativeTrackChanges',
                            'RealTimeCollaborativeRevisionHistory',
                            'PresenceList',
                            'Comments',
                            'TrackChanges',
                            'TrackChangesData',
                            'RevisionHistory',
                            'Pagination',
                            'WProofreader',
                            'MathType',
                            'SlashCommand',
                            'Template',
                            'DocumentOutline',
                            'FormatPainter',
                            'TableOfContents',
                            'PasteFromOfficeEnhanced',
                            'CaseChange'
                        ]
                    });
                }

                $(document).on('change', '#category_id', function(e) {
                    let category_id = $('option:selected', this).val();
                    if (category_id != undefined || category_id != null) {
                        let subcategorySelect = $("#sub_category_id");
                        subcategorySelect.empty().append('<option selected disabled>Searching...</option>');
                        $.ajax({
                            url: "{{ route('web.fetch_subcategories') }}",
                            type: "GET",
                            data: {
                                category_id: category_id,
                            },
                            success: function(response) {
                                let subcategoryData = response.data;
                                subcategorySelect.empty().append(
                                    '<option value="">Choose subcategory</option>');
                                $.each(subcategoryData, function(index, option) {
                                    subcategorySelect.append($('<option>', {
                                        value: option.id,
                                        text: option.name,
                                    }));
                                });
                            },
                            error: function(xhr) {
                                subcategorySelect.empty().append(
                                    '<option value="" selected disabled>Error</option>');
                            }
                        });
                    }
                });

                $(document).on('change', '#region_id', function(e) {
                    let region_id = $('option:selected', this).val();
                    if (region_id != undefined || region_id != null) {
                        let districtSelect = $('#district_id');
                        districtSelect.empty().append('<option selected disabled>Searching...</option>');
                        $.ajax({
                            url: "{{ route('web.fetch_districts') }}",
                            type: "GET",
                            data: {
                                region_id: region_id,
                            },
                            success: function(response) {
                                let districtData = response.data;
                                districtSelect.empty().append(
                                    '<option value="">Choose district</option>');
                                $.each(districtData, function(index, option) {
                                    districtSelect.append($('<option>', {
                                        value: option.id,
                                        text: option.name,
                                    }));
                                });
                            },
                            error: function(xhr) {
                                districtSelect.empty().append(
                                    '<option value="" selected disabled>Error</option>');
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
    <div class="card">
        <div class="card-header">
            <h4>Add Service</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('web.users.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="category_id">Service Category</label>
                            <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="sub_category_id">Service Subcategory</label>
                            <select name="sub_category_id" id="sub_category_id"
                                class="form-control @error('sub_category_id') is-invalid @enderror" required>
                                <option value="">Select Subcategory</option>
                            </select>
                            @error('sub_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="title">Service Title</label>
                            <input name="title" type="text"
                                class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                placeholder="Enter Service Title" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label" for="promo_video">Promo Video</label>
                            <input name="promo_video" type="text"
                                class="form-control @error('promo_video') is-invalid @enderror"
                                value="{{ old('promo_video') }}" placeholder="Enter Promo Video">
                            @error('promo_video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label" for="featured_image_file">Featured Image</label>
                            <input name="featured_image_file" type="file"
                                class="form-control @error('featured_image_file') is-invalid @enderror" required>
                            @error('featured_image_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label" for="website">Website Url</label>
                            <input name="website" type="text"
                                class="form-control @error('website') is-invalid @enderror"
                                value="{{ old('website') }}" placeholder="Enter Website Url">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-set">
                        <label class="col-form-label label-heading">Service Features </label>
                        <div class="row category-listing">
                            <div class="col-lg-4">
                                <ul>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="wireless-internet">
                                            <span class="checkmark"></span> Automotive
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="accept-credit-card">
                                            <span class="checkmark"></span> Electronics
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="Coupouns">
                                            <span class="checkmark"></span> Fashion Style
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="parking-street">
                                            <span class="checkmark"></span> Health Care
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="wireless-internet">
                                            <span class="checkmark"></span> Job board
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="accept-credit-card">
                                            <span class="checkmark"></span> Education
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="Coupouns">
                                            <span class="checkmark"></span> Real Estate
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="parking-street">
                                            <span class="checkmark"></span> Travel
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="wireless-internet">
                                            <span class="checkmark"></span> Sports & Game
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="accept-credit-card">
                                            <span class="checkmark"></span> Magazines
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="Coupouns">
                                            <span class="checkmark"></span> Pet & Animal
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom_check">
                                            <input type="checkbox" name="parking-street">
                                            <span class="checkmark"></span> Household
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="country_id">Country</label>
                            <select name="country_id" id="country_id"
                                class="form-control @error('country_id') is-invalid @enderror" required>
                                <option value="">Select Country</option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}" {{ $item->code == 'TZA' ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="region_id">Region</label>
                            <select name="region_id" id="region_id"
                                class="form-control @error('region_id') is-invalid @enderror" required>
                                <option value="">Select Region</option>
                                @foreach ($regions as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('region_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="district_id">District</label>
                            <select name="district_id" id="district_id"
                                class="form-control @error('district_id') is-invalid @enderror" required>
                                <option value="">Select District</option>
                            </select>
                            @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="address">Street Address</label>
                            <input name="address" type="text"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}" placeholder="Enter Street Address" required>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="zip_code">Zip Code</label>
                            <input name="zip_code" type="text"
                                class="form-control @error('zip_code') is-invalid @enderror"
                                value="{{ old('zip_code') }}" placeholder="Enter Zip Code">
                            @error('zip_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="phone">Phone Number</label>
                            <input name="phone" type="tel"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" placeholder="Enter Phone Number" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row col-md-4">
                        <div class="form-set">
                            <label class="col-form-label required" for="email">Email Address</label>
                            <input name="email" type="tel"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Enter Email Address" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-row col-12">
                        <div class="form-set">
                            <label class="col-form-label" for="short_description">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror"
                                placeholder="Enter short description" maxlength="150">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row col-12">
                        <div class="form-set">
                            <label class="col-form-label" for="description">Description</label>
                            <textarea id="description" name="description">{{ old('description') }}</textarea>


                        </div>
                    </div>
                </div>




                <div class=" media-section">
                    <h4>Media Information </h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 featured-img1">
                            <h6 class="media-title">Featured Image</h6>
                            <div class="media-image ">
                                <img src="{{ asset('assets/img/mediaimg-2.jpg') }}" alt>
                            </div>
                            <div class="settings-upload-btn">
                                <input type="file" accept="image/*" name="image"
                                    class="hide-input image-upload" id="file">
                                <label for="file" class="file-upload">Upload File</label>
                            </div>
                        </div>

                    </div>
                    <div class="gallery-media">
                        <h6 class="media-title">Gallery</h6>
                        <div class="galleryimg-upload">
                            <div class="gallery-upload">
                                <img src="{{ asset('assets/img/gallery/gallerymedia-1.jpg') }}" class="img-fluid" alt>
                                <a href="javascript:void(0)" class="profile-img-del"><i
                                        class="feather-trash-2"></i></a>
                            </div>
                            <div class="gallery-upload">
                                <img src="{{ asset('assets/img/gallery/gallerymedia-2.jpg') }}" class="img-fluid" alt>
                                <a href="javascript:void(0)" class="profile-img-del"><i
                                        class="feather-trash-2"></i></a>
                            </div>
                        </div>
                        <div class="settings-upload-btn">
                            <input type="file" accept="image/*" name="image" class="hide-input image-upload"
                                id="file2">
                            <label for="file2" class="file-upload">Upload File</label>
                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</x-vendor-layout>
