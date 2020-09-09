@if ($paginator->hasPages())
    {{-- <div class="ereaders-pagination">
        <ul class="page-numbers">

            <li>
                <a class="previous page-numbers" href="{{ $paginator->previousPageUrl() }}">
                    <span><i class="icon ereaders-arrow-point-to-right"></i></span>
                </a>
            </li>

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="page-numbers current" href="{{ $url }}">{{ $page }}</span></li>
                        @else
                            <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li>
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">
                    <span><i class="icon ereaders-arrow-point-to-right"></i></span>
                </a>
            </li>
        </ul>

    </div> --}}
    <nav class="woocommerce-pagination">
        <ul class="page-numbers">
            @if ($paginator->previousPageUrl())
                <li style="display:inline-block"><a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">&larr;</a></li>
            @endif
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="display:inline-block"><span class="page-numbers current" href="{{ $url }}">{{ $page }}</span></li>
                        @else
                            <li style="display:inline-block"><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->nextPageUrl())
                <li style="display:inline-block"><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">&rarr;</a></li>
            @endif
        </ul>
    </nav>
@endif
