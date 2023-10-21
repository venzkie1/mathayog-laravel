<div class="pagination flex justify-center items-center">
    @if ($paginator->currentPage() > 1)
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="text-decoration: underline" class="text-green-500">Prev </a>
    @endif

    <span class="current-page" style="margin: 0 5px"> {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="text-decoration: underline" class="text-green-500"> Next</a>
    @endif
</div>
