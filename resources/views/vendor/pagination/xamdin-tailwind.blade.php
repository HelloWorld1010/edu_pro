@if ($paginator->hasPages())
    <div class="page">
        <div>
            @if ($paginator->onFirstPage())
                <a class="prev" href="javascript:;">&lt;&lt;</a>
            @else
                <a class="prev" href="{{ $paginator->previousPageUrl() }}">&lt;&lt;</a>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="current">{{ $page }}</span>
                        @else
                            <a class="num" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <a class="next" href="{{ $paginator->nextPageUrl() }}">&gt;&gt;</a>
            @else
            <a class="next" href="javascript:;">&gt;&gt;</a>
            @endif
        </div>
    </div>
@endif
