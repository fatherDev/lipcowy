@php
$title = $title ?? '';
$subtitle = $subtitle ?? '';
@endphp

<section class="c-instagram-section" data-scroll-section>
  <div class="l-inner">
    @if ($title && $subtitle)
      <div>
        <h2 class="t-typo-h3 js-animated-text">{!! $title !!}</h2>
        <h3 class="t-typo-h5 ui-color--primary o-top-5 o-bot-40 o-desk-bot-80 js-animated-text">{!! $subtitle !!}
        </h3>
      </div>
    @endif
  </div>

  {!! do_shortcode('[instagram-feed feed=2]') !!}

  @include('icon::ig-bottom-blob')
  <img class="c-instagram-section__accent" src="@asset('/images/leaf-accent.png')" loading="lazy">
</section>
