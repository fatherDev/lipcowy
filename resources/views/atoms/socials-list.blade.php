@php
$socials = get_field('socials', 'option') ?? [];
$igLink = $socials['instagram']['url'] ?? '';
$fbLink = $socials['facebook']['url'] ?? '';
$ytLink = $socials['youtube']['url'] ?? '';
$vertical = $vertical ?? false;
@endphp


<div class="c-socials-list{{ $vertical ? ' c-socials-list--vertical' : '' }}">
  @if (!empty($igLink))
    <li class="c-socials-list__item">
      <a href="{{ $igLink }}" target="_blank" rel="nofollow" aria-label="instagram">
        @include('icon::instagram')
      </a>
    </li>
  @endif
  @if (!empty($fbLink))
    <li class="c-socials-list__item">
      <a href="{{ $fbLink }}" target="_blank" rel="nofollow" aria-label="facebook">
        @include('icon::facebook')
      </a>
    </li>
  @endif
  @if (!empty($ytLink))
    <li class="c-socials-list__item">
      <a href="{{ $ytLink }}" target="_blank" rel="nofollow" aria-label="youtube">
        @include('icon::youtube')
      </a>
    </li>
  @endif
</div>
