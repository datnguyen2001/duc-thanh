@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="flex justify-center align-center pagination-container">
        <ol class="flex justify-center align-center p-0 mb-0">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @php
                        // Determine the start and end pages
                        $start = max($paginator->currentPage() - 1, 1);
                        $end = min($start + 2, $paginator->lastPage());

                        if ($end - $start < 2) {
                            $start = max($end - 2, 1);
                        }
                    @endphp

                    {{-- Show "First" link if needed --}}
                    @if ($start > 1)
                        <li class="blob">
                            <a href="{{ $paginator->url(1) }}">1</a>
                        </li>
                        @if ($start > 2)
                            <li class="blob"><span>...</span></li>
                        @endif
                    @endif

                    {{-- Show pages within the range --}}
                    @foreach (range($start, $end) as $page)
                        @if ($page == $paginator->currentPage())
                            <li class="blob current-page">
                                <img src="{{asset('assets/images/ptr1.png')}}" alt="">
                                <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
                            </li>
                        @else
                            <li class="blob">
                                <img src="{{asset('assets/images/ptr2.png')}}" alt="">
                                <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Show "Last" link if needed --}}
                    @if ($end < $paginator->lastPage())
                        @if ($end < $paginator->lastPage() - 1)
                            <li class="blob"><span>...</span></li>
                        @endif
                        <li class="blob">
                            <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                        </li>
                    @endif
                @endif
            @endforeach
        </ol>
    </div>
    <!-- Pagination -->
@endif

