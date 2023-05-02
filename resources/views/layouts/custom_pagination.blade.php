@if ($players->hasPages())
                        <nav>
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($players->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true">
                                    <span class="page-link">@lang('pagination.previous')</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $players->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                                </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @for ($i = 1; $i <= $players->lastPage(); $i++)
                                    @if ($i == $players->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $i }}</span>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $players->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endif
                                    @endfor

                                    {{-- Next Page Link --}}
                                    @if ($players->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $players->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                                    </li>
                                    @else
                                    <li class="page-item disabled" aria-disabled="true">
                                        <span class="page-link">@lang('pagination.next')</span>
                                    </li>
                                    @endif
                            </ul>
                        </nav>
                        @endif