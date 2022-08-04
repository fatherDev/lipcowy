@php
$class = $class ?? '';
$text = $text ?? '';
$href = $href ?? '#';
$target = $target ?? '';
$icon = $icon ?? true;
@endphp

<div data-scroll class="c-button-alt__wrapper{{ $class ? ' ' . $class : '' }}">
  <a href="{{ $href }}" class="c-button-alt" target="{{ $target }}">
    <span class="c-button-alt__text">
      {!! $text !!}
    </span>
    @if ($icon === true)
      <div class="c-button-alt__icon-wrapper">
        @include('icon::document-icon', ['class' => 'c-button-alt__icon'])
      </div>
    @endif
  </a>
</div>
