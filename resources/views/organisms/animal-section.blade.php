@php
$class = $class ?? '';
$accent = $accent ?? '';
@endphp

@if (!empty($ACF))
  <section data-scroll-section class="l-animal-section{{ $class ? ' ' . $class : '' }}">
    @include('molecules.icon-text-block', [
        'ACF' => $ACF['icon_text_block'],
        'withoutPadding' => empty($accent) ? true : false,
    ])
    @include('molecules.img-text-block', [
        'ACF' => $ACF['img_text_block'],
    ])

    <img class="animal" src="@asset('/images/los.png')" alt="" loading="lazy">
    <img class="half-circle-right" src="@asset('/images/half-circle-right.svg')" alt="" loading="lazy">

    @if ($accent === 'with-two-blobs')
      <img class="left-top-blob" src="@asset('/images/left-top-blob.svg')" alt="" loading="lazy">
      <img class="half-circle-left" src="@asset('/images/half-circle-left.svg')" alt="" loading="lazy">
    @endif
  </section>
@endif
