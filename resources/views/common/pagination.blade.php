<ul class="pagination">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <li class="disabled"><span>上一页</span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页</a></li>
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
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
    @else
        <li class="disabled"><span>下一页</span></li>
    @endif
    @if ($paginator->hasPages())
		<li class="disabled" ><a  href="javascript:void(0);">当前第 {{ $paginator->currentPage() }}共 <span style="color:red">{{ceil($paginator->total()/15)}}</span> 页</a></li>
	@endif

</ul>