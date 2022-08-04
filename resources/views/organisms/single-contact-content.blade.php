@php
$class = $class ?? '';
@endphp

<section data-scroll-section class="c-single-contact-content{{ $class ? ' ' . $class : '' }}">
  <div class="c-single-contact-content__inner l-inner">

    {{-- Map --}}
    <div class="c-single-contact-content__map-container">
      <div class="c-single-contact-content__map js-map-container ui-responsive-img"></div>
    </div>

    <div class="c-single-contact-content__grid l-grid">

      {{-- Col --}}
      <div class="c-single-contact-content__col c-single-contact-content__col--left js-sticky-variable-provider"
        style="--top-sticky-position: 0px;" data-outer-tabs="false">

        {{-- Tabs with content --}}
        @include('molecules.tabs-with-content', [
            'data' => $data,
        ])

      </div>
    </div>
  </div>
</section>
