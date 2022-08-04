@php
$intro = $data['intro'] ?? '';
$introTitle = $intro['title'] ?? '';
$introDesc = $intro['desc1'] ?? '';
$repeater = $data['repeater'] ?? [];
$class = $class ?? '';
@endphp

@if ($introTitle || $introDesc || $repeater)
  <section data-scroll-section class="c-testimonials {{ $class }}">
    <div class="l-inner">
      @include('molecules.text-block', [
          'data' => $data['intro'],
      ])

      @include('molecules.testimonials-splide')
    </div>

    @if ($accent === 'with-big-blob')
      @include('icon::blob-right')
      @include('icon::blob-with-circle')
      @include('icon::home-opinions-blob')
      @include('icon::ellipse-blob')
    @endif

  </section>
@endif
