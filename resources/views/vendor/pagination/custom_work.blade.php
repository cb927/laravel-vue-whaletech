@if ($paginator->hasPages())
<div class="works__pagenation">
    <ul>
        @if ($paginator->onFirstPage())
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}">PREV</a>
        </li>
        @endif


        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li><a href="javascript:;" class="active">{{ $page }}</a></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach


        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}">NEXT</a>
        </li>
        @endif
    </ul>
</div>
@endif