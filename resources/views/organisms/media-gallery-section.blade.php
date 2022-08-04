@php
$socials = get_field('socials', 'option') ?? [];
$class = $class ?? '';
$mediumType = $data['medium_type'] ?? '';
$gallery = $data['gallery'] ?? '';
$video = $data['video'] ?? '';
$videoPoster = $data['video_poster'] ?? '';
$intro = $data['intro'] ?? '';
$addTitle = $data['add_title'] ?? false;
$accent = $accent ?? '';
$showSocialMedia = $showSocialMedia ?? false;
@endphp


@if (!empty($mediumType) && (!empty($gallery) || !empty($video)))
  <section data-scroll-section
    class="c-media-gallery {{ $mediumType === 'img' ? 'c-media-gallery--gallery' : '' }}{{ $class ? ' ' . $class : '' }}">
    <div class="c-media-gallery__inner l-inner">
      @if ($addTitle)
        {{-- Text block --}}
        @include('molecules.text-block', [
            'data' => $intro,
            'class' => 'c-media-gallery__text-block',
        ])
      @endif

      @if ($mediumType === 'img')

        {{-- Image gallery --}}
        <div class="c-media-gallery__splide splide js-media-gallery-splide">
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

          <div class="c-media-gallery__track splide__track">
            <ul class="c-media-gallery__list splide__list">
              @foreach ($gallery as $img)
                <li class="c-media-gallery__slide splide__slide">
                  <picture>
                    <source srcset='{{ $img['url'] ?? '' }}' media='(min-width: 768px)'
                      width='{{ $img['width'] ?? '' }}' height='{{ $img['height'] ?? '' }}'>
                    <img class='c-media-gallery__img ui-responsive-img'
                      src='{{ $img['sizes']['medium_large'] ?? '' }}' alt='{{ $img['alt'] ?? '' }}'
                      width='{{ $img['sizes']['medium_large-width'] ?? '' }}'
                      height='{{ $img['sizes']['medium_large-height'] ?? '' }}' loading='lazy'>
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
      @else
        {{-- Video --}}
        @if (!empty($video))
          <div class="c-media-gallery__video-wrapper js-video-wrapper">
            <div class="c-media-gallery__video-overlay ui-responsive-img">
              @include('icon::play-icon', [
                  'class' => 'c-media-gallery__video-icon',
              ])

            </div>
            <video class="c-media-gallery__video js-video ui-responsive-img" src="{{ $video['url'] ?? '' }}"
              preload="metadata" loop muted playsinline
              {{ $videoPoster ? 'poster=' . $videoPoster['url'] ?? '' : '' }}>
            </video>
            @if (!empty($data['video_title']))
              <p class="c-media-gallery__video-title">{{ $data['video_title'] ?? '' }}</p>
            @endif
          </div>
        @endif

      @endif
    </div>

    {{-- Accents --}}
    @if ($accent === 'spoon-big-blob-1')
      @include('icon::big-blob-1', [
          'class' => 'c-media-gallery__accent c-media-gallery__accent--big-blob',
      ])
      <img class="c-media-gallery__accent c-media-gallery__accent--cutlery" src="@asset('images/cutlery.png')" alt="Łyżka"
        loading="lazy">

      @include('icon::ring', [
          'class' => 'c-media-gallery__accent c-media-gallery__accent--ring',
      ])
    @elseif($accent === 'big-blob')
      @include('icon::semi-circular-blob', [
          'class' => 'c-media-gallery__accent c-media-gallery__accent--hero-blob',
      ])
      {{-- Accents and blobs for galeria --}}
    @elseif($accent === 'gallery-blobs')
      @if ($loop->index > 1)
        <img class="l-single-galeria__cutlery" src="@asset('./images/cutlery.png')" loading="lazy">
        @include('icon::archive-big-blob', ['class' => 'l-single-galeria__big-blob'])
      @elseif($loop->index == 0)
        @include('icon::archive-blob')
      @endif
    @elseif($accent === 'two-top-blobs')
      <img class="c-news-hero__blob" src="@asset('../images/news-blob.svg')" loading="lazy">
      <img class="c-news-hero__blob--green" src="@asset('../images/news-green-blob.svg')" loading="lazy">
      <img class="c-news-hero__leaf" src="@asset('../images/cropped-big-leaf.png')" loading="lazy">
    @endif

    @if ($showSocialMedia)
      {{-- Social media --}}
      <div class="c-media-gallery__social-media-bar">
        @include('atoms.socials-list', [
            'vertical' => true,
            'class' => 'c-media-gallery__social-media',
        ])
      </div>
    @endif

  </section>
@endif
