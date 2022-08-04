@php
$card = $data['card'] ?? '';
$title = $card['title'] ?? '';
$img = $card['img'] ?? '';
$btn = $card['btn'] ?? '';
$list = $card['list'] ?? [];

@endphp
@if ($title || $img || $btn || $list)
  <div class="c-short-menu-card">
    <div class="c-short-menu-card__grid l-grid">

      {{-- Text content --}}
      <div class="c-short-menu-card__inner l-inner">
        <div class="c-short-menu-card__text-content-wrapper">
          <div class="c-short-menu-card__grid c-short-menu-card__grid--text-content l-grid">
            <div class="c-short-menu-card__text-content">
              {{-- Title --}}
              <span class="c-short-menu-card__title">{!! $title !!}</span>

              {{-- List --}}
              @if ($list)
                <div class="c-short-menu-card__list-wrapper js-inside-scroll-outer">
                  <ul class="c-short-menu-card__list js-inside-scroll-inner">
                    @foreach ($list as $item)
                      @php
                        $itemTitle = $item['title'] ?? '';
                        $itemPrice = $item['price'] ?? '';
                        $itemDesc = $item['desc'] ?? '';
                      @endphp

                      <li class="c-short-menu-card__list-item">
                        <p class="c-short-menu-card__list-item-line">
                          <span class="c-short-menu-card__list-item-title">{!! $itemTitle !!}</span>
                          @if ($itemPrice)
                            <span
                              class="c-short-menu-card__list-item-price">{{ number_format($itemPrice, 2, ',', ' ') }}
                              zł</span>
                          @endif
                        </p>
                        <p class="c-short-menu-card__list-item-desc">{!! $itemDesc !!}</p>
                      </li>
                    @endforeach
                  </ul>
                </div>
              @endif

              {{-- Button --}}
              @if ($btn)
                @include('atoms.button', [
                    'text' => $btn['title'] ?? '',
                    'href' => $btn['url'] ?? '#',
                    'class' => 'c-short-menu-card__btn',
                ])
              @endif

            </div>
          </div>
        </div>
      </div>

      {{-- Image --}}
      <div class="c-short-menu-card__img-wrapper ui-img-inside-border ui-responsive-img">
        <img class="c-short-menu-card__img" src="{{ $img['url'] ?? '' }}" alt="{{ $img['alt'] ?? '' }}"
          loading="lazy">
      </div>

    </div>
  </div>
@endif
