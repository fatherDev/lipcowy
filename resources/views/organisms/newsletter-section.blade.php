@php
$class = $class ?? '';
$newsletter = get_field('newsletter', 'options');
$title = $newsletter['title'] ?? '';
$img = $newsletter['img'] ?? '';
@endphp

<section data-scroll-section class="c-newsletter-section{{ $class ? ' ' . $class : '' }}">
  <div class="c-newsletter-section__inner l-inner">
    <div class="c-newsletter-section__wrapper">
      <span class="c-newsletter-section__heading">Newsletter</span>
      <h5 class="c-newsletter-section__title js-animated-text">{!! $title !!}</h5>

      <div class="c-newsletter-section__input-block-wrapper">
        {{-- Clipped SVG with an image --}}
        <svg class="c-newsletter-section__svg" viewBox="0 0 322 380">
          <path class="c-newsletter-section__svg-path c-newsletter-section__svg-path--bg"
            d="M322 380H0V116.472L0.541095 116.469C7.30078 51.2595 76.5588 0 161 0C245.441 0 314.699 51.2595 321.459 116.469L322 116.472V380Z" />
          <defs>
            <clipPath id="svgClip">
              <path class="c-newsletter-section__svg-path"
                d="M25 380H297V132.819L296.543 132.817C290.833 71.6529 232.329 23.5732 161 23.5732C89.6708 23.5732 31.1671 71.6529 25.4571 132.817L25 132.819V380Z" />
            </clipPath>
          </defs>
          <image class="c-newsletter-section__svg-img" xlink:href="{{ $img['url'] ?? '' }}" x="0" y="0" width="100%"
            height="100%" preserveAspectRatio="xMidYMid slice" />
        </svg>

        {{-- Input --}}
        {!! do_shortcode("[newsletter_form form='1']") !!}

        <p class="c-newsletter-section__clause">Sprawdź naszą <a href="{{ get_privacy_policy_url() }}"
            class="c-newsletter-section__link">Politykę
            Prywatności</a> i dowiedz się, w jaki sposób przetwarzamy dane.</p>
      </div>

    </div>
  </div>
</section>
