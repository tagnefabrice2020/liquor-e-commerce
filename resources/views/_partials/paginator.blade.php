<ul class="pagination">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        {{-- <li class="disabled" class="page-item"><span>&laquo;</span></li> --}}
    @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active page-item"><span class="page-link">{{ $page }}</span></li>
                @elseif (($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2) || $page === $paginator->lastPage())
                    <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                @elseif($page == $paginator->lastPage() - 1)
                        <li class="disabled"><span class="page-link">...</span></li>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">{{__('products.next')}}</a></li>
    @else
        <li class="disabled page-item"><span class="page-link">{{__('products.next')}}</span></li>
    @endif
</ul>