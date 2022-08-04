@php
$ids = $ids ?? '';
@endphp

<div class="c-media-gallery__splide splide js-media-gallery-splide">
  @if (count($ids) > 1)
    {{-- Arrows --}}
    <div class="c-media-gallery__arrows splide__arrows">
      <button class="c-media-gallery__arrow splide__arrow splide__arrow--prev">
        @include('icon::arrow', ['class' => ''])
      </button>
      <button class="c-media-gallery__arrow splide__arrow splide__arrow--next">
        @include('icon::arrow', ['class' => ''])
      </button>
    </div>
  @endif

  <div class="c-media-gallery__track splide__track">
    <ul class="c-media-gallery__list splide__list">
      @foreach ($ids as $id)
        @php
          $img = wp_get_attachment_image_src($id, 'full');
          $imgURL = $img[0] ?? '';
          $imgAlt = get_post_meta($id, '_wp_attachment_image_alt', true);
        @endphp
        <li class="c-media-gallery__slide splide__slide">
          <picture>
            <img class='c-media-gallery__img ui-responsive-img' src='{{ $imgURL ?? '' }}' alt='{{ $imgAlt ?? '' }}'
              width='{{ $img[1] ?? '' }}' height='{{ $img[2] ?? '' }}' loading='lazy'>
          </picture>
        </li>
      @endforeach
    </ul>
  </div>
  @include('atoms.progress', [
      'class' => 'c-media-gallery__progress',
      'barClass' => 'js-home-media-gallery-bar',
  ])
</div>
