@php
$data = get_field('cta', 'options') ?? '';
@endphp

@if (!empty($data))
  <section data-scroll-section class="c-cta">
    <div class="l-inner">

      @if (!empty($data['subtitle']))
        <span class="t-typo-p1 o-bot-20">{{ $data['subtitle'] }}</span>
      @endif

      @if (!empty($data['title']))
        <h2 class="c-cta__title">{{ $data['title'] }}</h2>
      @endif

      @include('atoms.circle-button', [
          'data' => $data['link'],
      ])

    </div>


  </section>

  @include('organisms.contact-modal')

@endif
