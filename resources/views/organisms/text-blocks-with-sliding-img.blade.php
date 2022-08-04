<div class="l-sliding-img__wrapper l-grid">
  <div class="l-sliding-img__col l-sliding-img__col--left">

    @foreach ($ACF['text_blocks'] as $item)
      <div class="l-sliding-img__title js-animated-text">
        {{ $item['title'] ?? '' }}
      </div>
      <p data-scroll data-scroll-offset="30%" class="l-sliding-img__desc ui-fade-in">{{ $item['desc'] ?? '' }}</p>
    @endforeach

  </div>
  <div class="l-sliding-img__col l-sliding-img__col--right">
    <div data-scroll data-scroll-sticky data-scroll-offset="0, 10%" data-scroll-target=".l-sliding-img__wrapper"
      class="l-sliding-img__img-sticky-wrapper">
      <div data-scroll data-scroll-speed="2" data-scroll-offset="100%"
        class="l-sliding-img__img-wrapper ui-img-inside-border">
        <img class="l-sliding-img__img ui-responsive-img" src="{{ $ACF['img']['url'] }}"
          alt="{{ $ACF['img']['alt'] }}" loading="lazy">
      </div>
    </div>
  </div>
</div>
