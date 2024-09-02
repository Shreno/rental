@if ($paginator->hasPages())
    <div class="themesflat-pagination clearfix">
        <ul>
            @if ($paginator->onFirstPage())
                <!-- Disabled Previous Link -->
                <li><span class="page-numbers style"><i class="far fa-angle-left"></i></span></li>
            @else
                <!-- Active Previous Link -->
                <li><a href="{{ $paginator->previousPageUrl() }}" class="page-numbers style"><i class="far fa-angle-left"></i></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <!-- Dots -->
                    <li><span class="page-numbers">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <!-- Active Page Number -->
                            <li><span class="page-numbers current">{{ $page }}</span></li>
                        @else
                            <!-- Inactive Page Number -->
                            <li><a href="{{ $url }}" class="page-numbers">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <!-- Active Next Link -->
                <li><a href="{{ $paginator->nextPageUrl() }}" class="page-numbers style"><i class="far fa-angle-right"></i></a></li>
            @else
                <!-- Disabled Next Link -->
                <li><span class="page-numbers style"><i class="far fa-angle-right"></i></span></li>
            @endif
        </ul>
    </div>
@endif