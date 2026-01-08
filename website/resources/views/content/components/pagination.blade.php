<div class="uk-flex uk-flex-center uk-margin">
    <nav aria-label="Pagination">
        <ul class="uk-pagination" uk-margin>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="uk-disabled"><span uk-pagination-previous></span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><span uk-pagination-previous></span></a></li>
            @endif

            {{-- Pagination Links --}}
            @foreach ($paginator->links()->elements as $element)
                @if (is_string($element))
                    <li class="uk-disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="uk-active"><span aria-current="page">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><span uk-pagination-next></span></a></li>
            @else
                <li class="uk-disabled"><span uk-pagination-next></span></li>
            @endif
        </ul>
    </nav>
</div>
