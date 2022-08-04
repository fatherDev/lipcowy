@php
$class = $class ?? '';
$img = $img ?? '';
$imgUrl = $imgUrl ?? '';
@endphp

@if ($img || $imgUrl)
  <div class="c-rounded-img__wrapper{{ $class ? ' ' . $class : '' }}">
    <div class="c-rounded-img__inner">
      @if ($imgUrl)
        <img class="c-rounded-img" src="{{ $imgUrl }}" alt="" loading="lazy">
      @elseif($img)
        <img class="c-rounded-img" src="{{ $img['url'] ?? '' }}" alt="{{ $img['alt'] ?? '' }}" loading="lazy">
      @endif
    </div>
  </div>
@endif
