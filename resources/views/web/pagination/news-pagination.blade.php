<div class="blog-pagination">
    <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item previtem disabled">
                    <a class="page-link" href="#"><i class="fas fa-regular fa-arrow-left"></i> Prev</a>
                </li>
            @else
                <li class="page-item previtem">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                            class="fas fa-regular fa-arrow-left"></i> Prev</a>
                </li>
            @endif

            <li class="justify-content-center pagination-center">
                <div class="pagelink">
                    <ul>
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled"><a class="page-link"
                                        href="#">{{ $element }}</a></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active"><a class="page-link"
                                                href="#">{{ $page }} <span
                                                    class="visually-hidden">(current)</span></a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>
            </li>

            @if ($paginator->hasMorePages())
                <li class="page-item nextlink">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next <i
                            class="fas fa-regular fa-arrow-right"></i></a>
                </li>
            @else
                <li class="page-item nextlink disabled">
                    <a class="page-link" href="#">Next <i class="fas fa-regular fa-arrow-right"></i></a>
                </li>
            @endif
        </ul>
    </nav>
</div>
