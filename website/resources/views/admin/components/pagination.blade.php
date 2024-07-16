@if ($paginator->hasPages())
    <nav class="w-full sm:w-auto sm:mr-auto">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link"><i class="w-4 h-4" data-lucide="chevrons-left"></i></span></li>
                <li class="page-item disabled"><span class="page-link"><i class="w-4 h-4" data-lucide="chevron-left"></i></span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}" rel="prev"><i class="w-4 h-4" data-lucide="chevrons-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="w-4 h-4" data-lucide="chevron-left"></i></a></li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="w-4 h-4" data-lucide="chevron-right"></i></a></li>
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next"><i class="w-4 h-4" data-lucide="chevrons-right"></i></a></li>
            @else
                <li class="page-item disabled"><span class="page-link"><i class="w-4 h-4" data-lucide="chevron-right"></i></span></li>
                <li class="page-item disabled"><span class="page-link"><i class="w-4 h-4" data-lucide="chevrons-right"></i></span></li>
            @endif
        </ul>
    </nav>
@endif
