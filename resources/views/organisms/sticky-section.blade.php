@php
$stickyRepeater = $ACF['sticky_repeater'] ?? [];
$isAccent = $ACF['is_accent'] ?? false;
$isReversed = $ACF['is_reversed'] ?? false;

$accent = $accent ?? '';

if ($stickyRepeater) {
    $repeaterCount = count($stickyRepeater);
    $sectionHeightUnits = $repeaterCount === 1 ? 1 : $repeaterCount + 1;
}

$offset = 100;
$offsetHide = 0;
$random = rand(1, 1000);
@endphp

@if ($stickyRepeater)
  <section data-scroll-section id="l-sticky-section{{ $random }}"
    class="l-sticky-section {{ $isReversed ? 'l-sticky-section--reversed' : '' }} {{ $class ?? '' }}"
    style="--sectionHeight: {{ $sectionHeightUnits }}00vh">
    <div data-scroll data-scroll-sticky data-scroll-target="#l-sticky-section{{ $random }}"
      class="l-sticky-section__inner">
      @foreach ($stickyRepeater as $item)
        @if ($loop->first)
          @php
            $offsetAttrValue = 0;
            $offsetHideAttrValue = 0;
          @endphp
        @elseif($loop->last)
          @php
            $offsetAttrValue = $offset;
            $offsetHideAttrValue = $offsetHide - 100;
          @endphp
        @else
          @php
            $offsetAttrValue = $offset;
            $offsetHideAttrValue = $offsetHide;
          @endphp
        @endif

        <div data-scroll data-scroll-repeat
          data-scroll-offset="{{ $offsetAttrValue }}%, {{ $offsetHideAttrValue }}%" class="l-sticky-section__item">
          @include('molecules.full-height-img-text-block', [
              'ACF' => $item['single_sticky'] ?? '',
          ])
          @if ($loop->first && !$isAccent)
            {{-- Accents --}}
            @if ($accent === 'bird-with-big-leaf')
              <img class="l-sticky-section__accent l-sticky-section__accent--bird" src="@asset('images/bird.png')"
                alt="Czarny ptak w locie" aria-hidden="true" loading="lazy">
              <img class="l-sticky-section__accent l-sticky-section__accent--big-leaf" src="@asset('images/big-leaf.png')"
                alt="Wielki zielony liść" aria-hidden="true" loading="lazy">
            @endif
          @endif
        </div>

        @php
          $offset += 100;
          $offsetHide -= 100;
        @endphp
      @endforeach
    </div>
  </section>
@endif
