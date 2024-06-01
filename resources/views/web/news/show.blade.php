<x-web-layout>
    @push('styles')
    @endpush
    @push('scripts')
    @endpush


    <div class="blogbanner" style="background-image: url({{ $item->futured_image }})">
        <div class="blogbanner-content">
            <span class="blog-hint">{{ @$item->news_category->name }}</span>
            <h1>{{ @$item->detail->title }}</h1>
            <ul class="entry-meta meta-item">
                <li>
                    <div class="post-author">
                        <div class="post-author-img">
                            <img src="{{ @$item->user->profile_photo }}" alt="author">
                        </div>
                        <a href="javascript:void(0)"><span>{{ @$item->user->name }}</span></a>
                    </div>
                </li>
                <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> {{ $item->news_time }}</li>
            </ul>
        </div>
    </div>


    <div class="blogdetail-content">
        <div class="container">
            {!! $item->detail->description !!}

            <div class="share-postsection">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sharelink">
                            <a href="javasvript:void();" class="share-img"><i
                                    class="fas fa-light fa-share-nodes"></i></a>
                            <a href="javasvript:void();" class="share-text">Share</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tag-list">
                            <ul class="tags">
                                @foreach ($item->tags as $tag)
                                <li><a
                                    href="{{ route('web.news.index') }}?tag={{ str_replace('#', '', $tag->model->name) }}">{{ $tag->model->name }}</a> </li>


                            @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-web-layout>
