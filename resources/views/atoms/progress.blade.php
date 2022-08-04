@php
$class = $class ?? '';
$barClass = $barClass ?? '';
@endphp

<div class="c-progress{{ $class ? ' ' . $class : '' }}">
  <div class="c-progress__bar {{ $barClass ? ' ' . $barClass : '' }}"></div>
</div>
