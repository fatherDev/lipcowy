@php
$withoutPadding = $withoutPadding ?? false;
$accent = $accent ?? '';
@endphp

<div class="l-text-block{{ $withoutPadding ? ' o-top-0' : '' }} {{ $class ?? '' }}">
  <div class="l-inner">
    <div class="l-text-block__inner">
      @if ($ACF['text_block_checkbox'])
        <img width="156px" height="50px" class="c-text-block__icon" src="@asset('/images/accent.png')" alt="" loading="lazy">
      @endif
      <div data-scroll data-scroll-offset="30%" class="c-text-block__heading ui-fade-in">{!! $ACF['text_block'] ?? '' !!}</div>
    </div>
  </div>

  @if ($accent === 'bird-with-three-blobs')
    <img class="c-text-block__bird" src="@asset('../images/bird.png')">
    <img class="c-text-block__circle-right" src="@asset('/images/half-circle-right.svg')" alt="" loading="lazy">
    <img class="c-text-block__circle-left" src="@asset('/images/light-half-circle.svg')" alt="">
    <img class="c-text-block__blob" src="@asset('/images/green-blob.svg')" alt="" loading="lazy">
  @endif
</div>
