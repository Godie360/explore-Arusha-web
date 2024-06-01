<x-web-layout>
    @push('styles')
        <style>
            .blog-widget {
                display: flex;
                flex-wrap: nowrap;
                height: 100%;
            }

            .bloglistleft-widget.blog-listview .blog-img {
                flex: 0 0 40%;
                position: relative;
                overflow: hidden;
                align-items: stretch;
                display: flex;
            }

            .blog-widget img {
                width: 100%;
                height: auto;
                flex-grow: 1;
                object-fit: cover;
                display: block;
            }

            .blog-listview .bloglist-content {
                flex: 1;
                display: flex;
                align-items: center;
            }

            .card-body {
                width: 100%;
            }
        </style>
    @endpush
    @push('scripts')
    @endpush
    <div class="contactbanner innerbanner">
        <div class="inner-breadcrumb">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12 ">
                        <h2 class="breadcrumb-title">Latest News</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Latest News</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bloglisting listing-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bloglistleft-widget blog-listview">
                        @foreach ($news as $item)
                            <div class="card">
                                <div class="blog-widget">
                                    <div class="blog-img">
                                        <a href="{{ $item->web_show_url }}">
                                            <img src="{{ $item->futured_image }}" class="img-fluid" alt="blog-img" />
                                        </a>
                                        <div class="blog-category">
                                            <a
                                                href="javascript:void(0)"><span>{{ @$item->news_category->name }}</span></a>
                                        </div>
                                    </div>
                                    <div class="bloglist-content">
                                        <div class="card-body">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <div class="post-author-img">
                                                            <img src="{{ @$item->user->profile_photo }}"
                                                                alt="author" />
                                                        </div>
                                                        <a href="javascript:void(0)"><span>{{ @$item->user->name }}
                                                            </span></a>
                                                    </div>
                                                </li>
                                                <li class="date-icon">
                                                    <i class="fa-solid fa-calendar-days"></i>{{ $item->news_time }}
                                                </li>
                                            </ul>
                                            <h3 class="blog-title">
                                                <a href="{{ $item->web_show_url }}">{{ @$item->detail->title }}</a>
                                            </h3>
                                            <p class="mb-0">
                                                {{ @$item->detail->short_description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {!! $news->links('web.pagination.news-pagination') !!}



                </div>
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="rightsidebar">
                        <div class="card">
                            <h4>
                                <img src="{{ asset('assets/img/details-icon.svg') }}" alt="details-icon" />
                                Filter
                            </h4>
                            <div class="filter-content looking-input form-set mb-0">
                                <form action="{{ route('web.news.index') }}" method="GET">
                                    <input type="text" class="form-control" name="se" id="se"
                                        placeholder="To Search type and hit enter" />

                                </form>
                            </div>
                        </div>
                        <div class="card tags-widget">
                            <h4><i class="feather-tag"></i> Tags</h4>

                            <ul class="tags">

                                @foreach ($news as $item)
                                    @foreach ($item->tags->take(10) as $tag)
                                        <li> <a
                                                href="?tag={{ str_replace('#', '', $tag->model->name) }}">{{ $tag->model->name }}</a>
                                        </li>
                                    @endforeach
                                @endforeach

                            </ul>
                        </div>
                        <div class="card">
                            <h4><i class="feather-tag"></i>Related News</h4>
                            @foreach ($populars as $item)

                            <div class="article">

                                <div class="article-blog">
                                    <a href="{{ $item->web_show_url }}">
                                        <img class="img-fluid" src="{{ $item->futured_image }}" alt="Blog" />
                                    </a>
                                </div>
                                <div class="article-content">
                                    <h5>
                                        <a href="{{ $item->web_show_url }}">{{ @$item->detail->title }}</a>
                                    </h5>
                                    <div class="article-date">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>{{ $item->news_time }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-web-layout>
