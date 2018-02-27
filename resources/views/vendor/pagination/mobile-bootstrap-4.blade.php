@if ($paginator->hasPages())
	<ul class="pager hidden-sm hidden-md hidden-lg">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="col-xs-4 lastpage"><a href="javascript:;"><img src="/img/lastpage.png"></a></li>
        @else
            <li class="col-xs-4 lastpage"><a href="{{ $paginator->previousPageUrl() }}"><img src="/img/lastpage.png"></a></li>
        @endif

		{{-- Page Number --}}
		<li class="col-xs-4">{{$paginator->currentPage()}}/{{$paginator->lastPage()}}</li>
		
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        	<li class="col-xs-4 nextpage"><a href="{{ $paginator->nextPageUrl() }}"><img src="/img/nextpage.png"></a></li>
        @else
        	<li class="col-xs-4 nextpage"><a href="javascript:;"><img src="./img/nextpage.png"></a></li>
        @endif
    </ul>
@endif
