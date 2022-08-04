@php
$class = $class ?? '';
$img = $data['img'] ?? '';
$tabs = $data['tabs'] ?? [];
$btnText = $btnText ?? 'Pobierz menu pdf';
$outerTabs = $outerTabs ?? [];
@endphp

<section data-scroll-section class="c-tabs-section{{ $class ? ' ' . $class : '' }}">
  <div class="c-tabs-section__inner">

    {{-- Image --}}
    <div class="l-inner-no-pr-tablet">
      <div class="c-tabs-section__img-wrapper ui-img-inside-border">
        <img class="c-tabs-section__img ui-responsive-img" src="{{ $img['url'] ?? '' }}"
          alt="{{ $img['alt'] ?? '' }}" loading="lazy">
      </div>
    </div>

    <div class="c-tabs-section__grid l-grid">

      {{-- Col --}}
      <div class="c-tabs-section__col c-tabs-section__col--left js-sticky-variable-provider"
        style="--top-sticky-position: 0px;" data-outer-tabs="{{ $outerTabs ? true : false }}">

        {{-- Tabs with content --}}
        @include('molecules.tabs-with-content', [
            'data' => $tabs,
            'outerTabs' => $outerTabs,
            'smallTabs' => $outerTabs ? true : false,
        ])
      </div>
    </div>

  </div>
</section>
