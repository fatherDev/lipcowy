@php
$class = $class ?? '';
$wrapperClass = $wrapperClass ?? '';
$text = $text ?? '';
$href = $href ?? '#';

//! DEFAULT WAS FALSE
// $isActive = $isActive ?? false;

$isActive = $isActive ?? true;
$animate = $animate ?? false;
@endphp

<div data-scroll data-scroll-offset="30%" class="c-button__wrapper {{ $animate ? 'ui-fade-in' : '' }}">
  <a class="c-button {{ $isActive ? ' c-button--active' : '' }}{{ $class ? ' ' . $class : '' }}"
    href="{{ $href }}">
    <div class="c-button__arrow-icon">
      @include('icon::arrow', ['class' => 'c-button__arrow'])
    </div>
    <span class="c-button__text">{{ $text }}</span>
  </a>
</div>
