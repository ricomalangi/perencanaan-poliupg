@if ($paginator->hasPages())
<div class="m-2 mx-auto w-100">
    <nav>
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="page-link" aria-hidden="true" href="#" tabindex="-1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            </li>
            @else
            <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a class="page-link" aria-hidden="true" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            </li>
            @endif


            @foreach ($paginator->getUrlRange(max(1, $paginator->currentPage() - 1), min($paginator->lastPage(), $paginator->currentPage() + 1)) as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">{{ $page }} <span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            
            @if ($paginator->hasMorePages())
            <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link" aria-hidden="true" href="{{ $paginator->nextPageUrl() }}" tabindex="-1"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li>
            @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link" aria-hidden="true" href="#" tabindex="-1"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif