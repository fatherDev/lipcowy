@php
$title = $data['title'] ?? '';
$img = $data['img'] ?? '';
$desc = $data['desc'] ?? '';
@endphp

@if ($title || $img || $desc)
  <section class="c-gallery-hero" data-scroll-section>
    <div class="l-inner">
      @if ($title)
        <h1 class="c-gallery-hero__title">{!! $title !!}</h1>
      @endif

      @if ($img)
        <div class="c-gallery-hero__img">
          <img class="ui-img-full" src="{{ $img['url'] ?? '' }}" alt="{{ $img['alt'] }}" loading="lazy">
        </div>
      @endif

      @if ($desc)
        <div class="c-gallery-hero__desc">{!! $desc !!}</div>
      @endif

    </div>
    @include('icon::archive-blob')
    <div>
      <img class="c-gallery-hero__bird" src="@asset('../images/bird.png')" loading="lazy">
      @include('icon::archive-circle')
    </div>
  </section>
@endif
