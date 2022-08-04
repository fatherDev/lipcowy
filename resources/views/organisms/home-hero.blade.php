@php
$class = $class ?? '';
$slides = $data ?? [];
$socials = get_field('socials', 'option') ?? [];
@endphp

<section data-scroll-section class="c-home-hero{{ $class ? ' ' . $class : '' }}">

  <div class="splide c-home-hero__splide js-home-hero-splide">
    <div class="splide__track c-home-hero__track">
      <ul class="splide__list c-home-hero__list">
        @foreach ($slides as $slide)
          @php
            $slideContent = $slide['slide'] ?? [];
            $bgDesktopImg = $slideContent['hero_bg']['desktop_img'] ?? '';
            $bgMobileImg = $slideContent['hero_bg']['mobile_img'] ?? '';
            $bgDesktopVideo = $slideContent['hero_video']['desktop_video'] ?? '';
            $bgMobileVideo = $slideContent['hero_video']['mobile_video'] ?? '';
            $isOverlay = $slideContent['is_overlay'] ?? '';
            $title = $slideContent['hero_title'] ?? '';
            $mediumType = $slideContent['hero_medium_type'] ?? '';
            $btn = $slideContent['hero_btn'] ?? '';
            $desc = $slideContent['hero_text_block'] ?? '';
            $index = $loop->index + 1;
          @endphp

          <li class="splide__slide c-home-hero__slide">
            {{-- Slide background --}}
            @if ($mediumType === 'img')
              <picture class="c-home-hero__slide-picture">
                <source srcset="{{ $bgDesktopImg['url'] ?? '' }}" media="(min-width:768px)">
                <img class="c-home-hero__slide-bg" src="{{ $bgMobileImg['url'] ?? ($bgDesktopImg['url'] ?? '') }}"
                  alt="{{ $bgMobileImg['alt'] ?? ($bgDesktopImg['alt'] ?? '') }}" loading="lazy">
              </picture>
            @else
              <video class="c-home-hero__slide-bg" preload="auto" autoplay loop muted playsinline
                data-desktop-vid="{{ $bgDesktopVideo['url'] ?? '' }}"
                data-mobile-vid="{{ $bgMobileVideo['url'] ?? ($bgDesktopVideo['url'] ?? '') }}">
              </video>
            @endif

            {{-- Slide overlay --}}
            @if ($isOverlay)
              <img class="c-home-hero__slide-overlay" src="@asset('/images/bg-mask.png')" alt="Gray overlay" loading="lazy">
            @endif

            <div class="c-home-hero__slide-text-content">
              @if ($index < 7)
                <{{ 'h' . $index }} class="c-home-hero__slide-title js-animated-text">{!! $title !!}
                  </{{ 'h' . $index }}>
                @else
                  <h6 class="c-home-hero__slide-title js-animated-text">{!! $title !!}</h6>
              @endif
              <p class="c-home-hero__slide-desc ui-fade-in" style="--i:2">{!! $desc !!}</p>

              {{-- Slide button --}}
              @if ($btn)
                <div class="c-home-hero__slide-btn-wrapper ui-fade-in" style="--i:3">
                  @include('atoms.button', [
                      'text' => $btn['title'] ?? '',
                      'href' => $btn['url'] ?? '#',
                      'class' => 'c-home-hero__slide-btn',
                      'isActive' => true,
                  ])
                </div>
              @endif
            </div>
          </li>
        @endforeach
      </ul>

    </div>
  </div>


  {{-- Social media bar --}}
  <div class="c-home-hero__social-media-bar">
    @php
      $igLink = $socials['instagram']['url'] ?? '';
      $fbLink = $socials['facebook']['url'] ?? '';
      $ytLink = $socials['youtube']['url'] ?? '';
    @endphp
    @if ($igLink)
      <a href="{{ $igLink }}" target="_blank" rel="nofollow" class="c-home-hero__social-media">
        @include('icon::instagram')
      </a>
    @endif
    @if ($fbLink)
      <a href="{{ $fbLink }}" target="_blank" rel="nofollow" class="c-home-hero__social-media">
        @include('icon::facebook')
      </a>
    @endif
    @if ($ytLink)
      <a href="{{ $ytLink }}" target="_blank" rel="nofollow" class="c-home-hero__social-media">
        @include('icon::youtube')
      </a>
    @endif
  </div>


  {{-- Progress bar --}}
  @include('atoms.progress', [
      'class' => 'c-home-hero__progress',
      'barClass' => 'c-home-hero__progress-bar js-home-hero-progress-bar',
  ])

</section>
