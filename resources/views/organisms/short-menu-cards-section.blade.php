@php
$intro = $data['intro'] ?? '';
$introTitle = $intro['title'] ?? '';
$introDesc = $intro['desc1'] ?? '';
$menuCards = $data['menu_cards'] ?? [];
$class = $class ?? '';
@endphp

@if ($introTitle || $introDesc || $menuCards)
  <section class="c-short-menu-cards-section{{ $class ? ' ' . $class : '' }}" data-scroll-section>
    <div class="c-short-menu-cards-section__accent-wrapper">
      <div class="c-short-menu-cards-section__inner l-inner">
        <div class="c-short-menu-cards-section__text-block-wrapper">

          {{-- Text block --}}
          @include('molecules.text-block', [
              'data' => $intro,
              'class' => 'c-short-menu-cards-section__text-block',
          ])
        </div>
      </div>

      {{-- Accents --}}
      <img class="c-short-menu-cards-section__accent c-short-menu-cards-section__accent--plant-1" src="@asset('/images/plant-1.png')"
        alt="Roślina" aria-hidden="true" loading="lazy">
      <img class="c-short-menu-cards-section__accent c-short-menu-cards-section__accent--plant-2" src="@asset('/images/plant-2.png')"
        alt="Roślina" aria-hidden="true" loading="lazy">
      <img class="c-short-menu-cards-section__accent c-short-menu-cards-section__accent--plant-3" src="@asset('/images/plant-1.png')"
        alt="Roślina" aria-hidden="true" loading="lazy">
      <img class="c-short-menu-cards-section__accent c-short-menu-cards-section__accent--plant-4" src="@asset('/images/plant-2.png')"
        alt="Roślina" aria-hidden="true" loading="lazy">
    </div>


    {{-- Short menu cards --}}
    @if ($menuCards)
      @foreach ($menuCards as $menuCard)
        @include('molecules.short-menu-card', ['data' => $menuCard])
      @endforeach
    @endif
  </section>
@endif
