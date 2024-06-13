<x-admin-layout>
    @push('styles')
    @endpush

    @push('scripts')
        <script src="{{ asset('admin/assets/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    @endpush

    <div class="content">
        <div class="row">
            <div class="col-xl-8">

                <div class="service-images big-gallery">
                    <img src="{{ $news->futured_image }}" class="img-fluid" alt="img" />
                    <a href="{{ $news->futured_image }}" data-fancybox="gallery" class="btn btn-show"><i
                            class="fe fe-image me-1"></i> Show all photos</a>
                </div>
                <div class="serv-profile">
                    <h2>{{ $news->detail->title }}</h2>

                </div>
                <div class="service-wrap provide-service">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="provide-box">
                                <img src="{{ $news->user->profile_photo }}" class="img-fluid" alt="img" />
                                <div class="provide-info">
                                    <h6>{{ $news->user->name }}</h6>
                                    <div class="serv-review">
                                        <i class="fa-solid fa-clock"></i> <span>{{ $news->created_time }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-wrap">
                    {!! $news->detail->short_description !!}

                    <hr>
                    <h5>News Details</h5>
                    {!! $news->detail->description !!}
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card card-provide">
                    <div class="card-body">
                        <div class="provide-widget">
                            @if ($news->status->value == NewsStatusEnum::Draft->value || $news->status->value == NewsStatusEnum::Pending->value)
                                <a class="btn btn-primary w-100"
                                    href="{{ route('admin.news.status', ['id' => $news->id, 'status' => NewsStatusEnum::Published->value]) }}">
                                    <span class="indicator-label">Publish</span>
                                </a>
                            @endif
                            @if ($news->status->value == NewsStatusEnum::Published->value)
                                <a class="btn btn-warning w-100"
                                    href="{{ route('admin.news.status', ['id' => $news->id, 'status' => NewsStatusEnum::Pending->value]) }}">
                                    <span class="indicator-label">Un Publish</span>
                                </a>
                            @endif

                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
