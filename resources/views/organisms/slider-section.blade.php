@php
$data = $data ?? false;
$intro = $data['intro'] ?? '';
$isGallery = $data['is_gallery'] ?? '';
$gallery = $data['gallery'] ?? '';
$posts = $data['halls'];

$title = $posts ? 'Nasze wyjątkowe sale' : get_the_title();

@endphp

@if ($intro && (!empty($gallery) || !empty($posts)))
  <section id="sale"
    class="c-slider-section {{ $isGallery == 'gallery' ? 'c-slider-section--reverse' : '' }} js-gallery-container"
    data-scroll-section>
    {{-- @if ($isGallery == 'halls')
      <span class="c-slider-section__counter js-gallery-counter">01</span>
    @endif --}}
    <div class="l-inner">
      <div class="l-grid">
        <div class="c-slider-section__text-block">

          @if ($isGallery == 'gallery')
            @if ($intro['title'])
              <h2 class="c-slider-section__title">{!! $intro['title'] !!}</h2>
            @endif
            @if ($intro['desc1'])
              <p class="t-typo-p2">{!! $intro['desc1'] !!}</p>
            @endif
          @else
            @include('molecules.text-block', ['data' => $intro])

          @endif


          <div class="c-slider-section__arrows">
            <button class="c-slider-section__arrow c-slider-section__arrow--prev js-slider-section-prev">
              @include('icon::arrow', ['class' => 'prev'])
            </button>
            <div class="c-slider-section__progress js-slider-section-progress">
              <div></div>
            </div>
            <button class="c-slider-section__arrow c-slider-section__arrow--next js-slider-section-next">
              @include('icon::arrow')
            </button>
          </div>
        </div>

        <div class="c-slider-section__splide">
          {{-- Circle text next to slider --}}
          @include('atoms.circle-text', [
              'id' => 'slider-section-circle',
              'text' => $title,
              'class' => 'c-slider-section__circle',
          ])

          @include('molecules.gallery-slider', [
              'posts' => $posts,
              'gallery' => $gallery,
              'isGallery' => $isGallery,
          ])
        </div>
      </div>
    </div>
    @include('icon::halls-blob', ['class' => 'c-slider-section__blob'])
  </section>
@endif
