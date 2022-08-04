@php
$text = $text ?? '';
$href = $href ?? '#';
$rel = $rel ?? '';
$openInNewWindow = $openInNewWindow ?? false;
$light = $light ?? false;
$icon = $icon ?? '';
@endphp

<a href="{{ $href }}"
  class="c-floating-button{{ $light ? ' c-floating-button--light' : '' }} js-floating-button" rel="{{ $rel }}"
  target="{{ $openInNewWindow ? '_blank' : '_self' }}">

  {{-- Text --}}
  <span class="c-floating-button__text">{{ $text }}</span>

  {{-- Icon --}}
  @if ($icon)
    <div class="c-floating-button__icon-wrapper">
      @include('icon::' . $icon, ['class' => 'c-floating-button__icon c-floating-button__icon--visible'])
      @include('icon::' . $icon, ['class' => 'c-floating-button__icon c-floating-button__icon--hidden'])
    </div>
  @endif
</a>
