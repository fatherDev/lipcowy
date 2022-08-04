<div class="l-full-img-text-block">
  <div class="l-inner">
    <div class="l-full-img-text-block__inner l-grid">
      <div class="l-full-img-text-block__col l-full-img-text-block__col--left">
        <div class="c-img-text-block__wrapper l-full-img-text-block__text-block-wrapper">
          @include('molecules.text-block', [
              'data' => $ACF['text_block'] ?? '',
              'class' => 'l-full-img-text-block__text-block',
          ])
          @if ($ACF['img_text_check'] === true)
            @include('atoms.button', [
                'text' => $ACF['link']['title'] ?? '',
                'href' => $ACF['link']['url'] ?? '#',
                'class' => 'c-text-block-btn',
                'animate' => true,
            ])
          @endif
        </div>
      </div>
      <div class="l-full-img-text-block__col l-full-img-text-block__col--right">
        <div
          class="c-img-text-block__img-wrapper c-full-img-text-block__img-wrapper ui-img-inside-border ui-responsive-img">
          <img src="{{ $ACF['img']['url'] ?? '' }}" alt="{{ $ACF['img']['alt'] ?? '' }}"
            class="c-img-text-block__img c-full-img-text-block__img" width="{{ $ACF['img']['width'] ?? '' }}"
            height="{{ $ACF['img']['height'] ?? '' }}" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</div>
