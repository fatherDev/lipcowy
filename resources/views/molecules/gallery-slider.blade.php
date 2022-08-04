@php
$posts = $posts ? $posts : [];
$gallery = $gallery ? $gallery : [];
$arrows = $arrows ?? true;
@endphp

@if ($posts || $gallery)
  <div class="c-gallery-slider splide js-gallery-splide"
    {{ $isGallery == 'gallery' ? `data-splide='{"direction":"rtl"}'` : '' }}>

    {{-- @if ((count($posts) > 1 || count($gallery) > 1) && $arrows)
      <div class="c-media-gallery__arrows splide__arrows">
        <button class="c-media-gallery__arrow splide__arrow splide__arrow--prev">
          @include('icon::arrow', ['class' => ''])
        </button>
        <button class="c-media-gallery__arrow splide__arrow splide__arrow--next">
          @include('icon::arrow', ['class' => ''])
        </button>
      </div>
    @endif --}}

    <div class="c-gallery-slider__track splide__track ">
      <ul class="c-gallery-slider__list splide__list ">
        @if ($isGallery == 'halls')

          {{-- A post type slide --}}
          @foreach ($posts as $post)
            @php
              $heroACF = get_field('hero', $post);
              $subtitle = $heroACF['subtitle'] ?? '';
            @endphp
            <li class="c-gallery-slider__item splide__slide">
              <div class="c-gallery-slider__wrapper ">
                <a href="{{ get_permalink($post) }}">

                  <div class="ui-img-inside-border">
                    <img class="c-gallery-slider__img ui-img-full" src="{{ get_the_post_thumbnail_url($post) }}"
                      alt="{{ get_the_title($post) }}" loading="lazy">
                  </div>

                  <div class="c-gallery-slider__box">
                    <h3 class="t-typo-h5 o-desk-bot-15">{{ get_the_title($post) }}</h3>

                    @if (!empty($subtitle))
                      <h4 class="t-typo-p1 o-bot-15 ui-hide-mobile-tablet">{{ $subtitle }}</h4>
                    @endif

                    <p class="t-typo-p3 ui-hide-mobile-tablet">{{ get_the_excerpt($post) }}</p>
                  </div>
                  <div class="c-gallery-slider__bg"></div>

                </a>
              </div>

            </li>
          @endforeach
        @else
          {{-- Non post type slide (Only img for gallery) --}}
          @foreach ($gallery as $item)
            <li class="c-gallery-slider__item splide__slide">
              <div class="ui-img-inside-border">
                <img class="c-gallery-slider__img ui-img-full" src="{{ $item['url'] }}" alt="{{ $item['alt'] }}"
                  loading="lazy">
              </div>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </div>
@endif
