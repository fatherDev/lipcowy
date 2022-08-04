@php
$isSection = $isSection ?? false;
@endphp

@if (!empty($ACF['img']))
  <div {{ $isSection ? 'data-scroll-section' : '' }} class="l-img-text-block">
    <div class="l-inner">
      <div class="l-img-text-block__inner l-grid">
        <div class="l-img-text-block__col l-img-text-block__col--left">
          <div class="c-img-text-block__img-wrapper ui-img-inside-border ui-responsive-img">
            <img src="{{ $ACF['img']['url'] ?? '' }}" alt="{{ $ACF['img']['alt'] ?? '' }}" class="c-img-text-block__img"
              width="{{ $ACF['img']['width'] ?? '' }}" height="{{ $ACF['img']['height'] ?? '' }}" loading="lazy">
          </div>
        </div>
        <div data-scroll class="l-img-text-block__col l-img-text-block__col--right">
          <div class="c-img-text-block__wrapper">
            @include('molecules.text-block', [
                'data' => $ACF['text_block'],
            ])

            <div class="c-img-text-block__btns">
              @if ($ACF['img_text_check'] === true)
                @include('atoms.button', [
                    'text' => $ACF['link']['title'] ?? '',
                    'href' => $ACF['link']['url'] ?? '#',
                    'class' => 'c-text-block-btn',
                    'animate' => true,
                ])
              @endif
              @if ($ACF['img_text_check2'] === true)
                @include('atoms.button', [
                    'text' => $ACF['link2']['title'] ?? '',
                    'href' => $ACF['link2']['url'] ?? '#',
                    'class' => 'c-text-block-btn',
                    'animate' => true,
                ])
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endif
