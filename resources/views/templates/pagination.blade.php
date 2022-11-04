@if ($paginator->hasPages())
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <nav>
          <ul class="pagination bg-gray text-white justify-content-center flex-wrap">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
              <li class="page-item disabled" aria-disabled="true"
                  aria-label="@lang('pagination.previous')">
                <span class="page-link rounded-0 bg-gray" aria-hidden="true">Anterior</span>
              </li>
            @else
              <li class="page-item">
                <a class="page-link rounded-0 bg-gray" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   aria-label="@lang('pagination.previous')">Anterior</a>
              </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                <li class="page-item disabled rounded-0 bg-gray" aria-disabled="true">
                  <span class="page-link">{{ $element }}</span>
                </li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))

                @if(sizeof($element) == 2)
                  @if(array_key_first($element) <= 1)
                    <li class="page-item rounded-0 bg-gray" aria-current="page">
                      <a class="page-link" href="{{$element[array_key_first($element)]}}">{{ array_key_first($element) }}</a>
                    </li>
                    @continue
                  @elseif(array_key_last($element) > 2)
                    <li class="page-item rounded-0 bg-gray" aria-current="page">
                      <a class="page-link" href="{{$element[array_key_last($element)]}}">{{ array_key_last($element) }}</a>
                    </li>
                    @continue
                  @endif
                @endif

                @foreach ($element as $page => $url)
                  @if ($page == $paginator->currentPage())
                    <li class="page-item active rounded-0 bg-gray" aria-current="page">
                      <span class="page-link">{{ $page }}</span>
                    </li>
                  @else
                    <li class="page-item rounded-0 bg-gray">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                  @endif
                @endforeach
              @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
              <li class="page-item">
                <a class="page-link rounded-0 bg-gray" href="{{ $paginator->nextPageUrl() }}" rel="next"
                   aria-label="@lang('pagination.next')">Próximo</a>
              </li>
            @else
              <li class="page-item disabled" aria-disabled="true"
                  aria-label="@lang('pagination.next')">
                <span class="page-link rounded-0 bg-gray" aria-hidden="true">Próximo</span>
              </li>
            @endif

          </ul>
        </nav>
      </div>
    </div>
  </div>
@endif
