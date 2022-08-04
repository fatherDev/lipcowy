@php
$gallery = $data['gallery'] ?? [];
$img = $data['img'] ?? '';
$btn = $data['btn'] ?? '';
$subtitle = $data['subtitle'] ?? '';
$accent = $accent ?? '';
@endphp

<section data-scroll-section class="c-single-sale-hero">

  <div class="c-single-sale-hero__inner c-single-sale-hero__inner--first l-inner">
    <div class="c-single-sale-hero__grid c-single-sale-hero__grid--first l-grid">

      {{-- Left col --}}
      <div class="c-single-sale-hero__col c-single-sale-hero__col--left">
        <h1 class="c-single-sale-hero__title js-animated-text">{!! the_title() !!}</h1>

        {{-- Circle button --}}
        @include('atoms.circle-button', [
            'data' => $btn,
        ])
      </div>

      {{-- Right col --}}
      <div class="c-single-sale-hero__col c-single-sale-hero__col--right">

        {{-- Gallery --}}
        @if ($gallery)
          <div class="c-single-sale-hero__gallery">
            <div class="c-single-sale-hero__splide splide js-media-gallery-splide">
              @if (count($gallery) > 1)
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
              <div class="c-single-sale-hero__track splide__track">
                <ul class="c-single-sale-hero__list splide__list">
                  @foreach ($gallery as $galleryIMG)
                    <li class="c-single-sale-hero__slide splide__slide">
                      <img class="c-single-sale-hero__slide-img ui-responsive-img"
                        src="{{ $galleryIMG['url'] ?? '' }}" alt="{{ $galleryIMG['alt'] ?? '' }}" loading="lazy">
                    </li>
                  @endforeach
                </ul>
              </div>

              {{-- Progress bar --}}
              @include('atoms.progress', [
                  'class' => 'c-single-sale-hero__progress',
                  'barClass' => 'js-home-media-gallery-bar',
              ])
            </div>
          </div>
        @endif
      </div>
    </div>

    {{-- Rounded image --}}
    @if ($img)
      @include('atoms.rounded-img', [
          'class' => 'c-single-sale-hero__rounded-img',
          'img' => $img,
      ])
    @endif

  </div>
  <div class="c-single-sale-hero__inner c-single-sale-hero__inner--second l-inner">
    <div class="c-single-sale-hero__grid c-single-sale-hero__grid--second l-grid">
      <h2 class="c-single-sale-hero__subtitle js-animated-text">{!! $subtitle !!}</h2>
    </div>
  </div>

  {{-- Accents --}}
  @if ($accent === 'leaf-with-left-blobs')
    <img class="c-single-sale-hero__accent c-single-sale-hero__accent--big-leaf" src="@asset('images/big-leaf-2.png')"
      alt="Wielki zielony liść" aria-hidden="true" loading="lazy">

    @include('icon::cropped-ballon-and-circle-blob', [
        'class' => 'c-single-sale-hero__accent c-single-sale-hero__accent--left-bottom-blobs',
    ])
  @endif

</section>
