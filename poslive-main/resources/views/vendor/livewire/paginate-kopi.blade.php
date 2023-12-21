@if ($paginator->hasPages())
    @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
    <ul class="pagination_nav ul_li_center">
        @if ($paginator->onFirstPage())
            <li class="disable" aria-label="@lang('pagination.previous')"><a href="#!"><i class="fal fa-angle-double-left"></i></a></li>
        @else
            <li>
                <a href="javascript:void(0);" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')"><i class="fal fa-angle-double-left"></i></a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><a href="javascript:void(0);">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}" aria-current="page"><a>{{ $page }}</a></li>
                    @else
                        <li wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"><a href="javascript:void(0);" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li>
                <a href="javascript:void(0);" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"  wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')"><i class="fal fa-angle-double-right"></i></a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="javascript:void(0);" aria-hidden="true"><i class="fal fa-angle-double-right"></i></a></span>
            </li>
        @endif
    </ul>
@endif
