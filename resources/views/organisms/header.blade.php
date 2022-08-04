@php
$contact = get_field('contact_info', 'option') ?? [];
$socials = get_field('socials', 'option') ?? [];
@endphp

<header class="l-header">
  <div class="l-inner">
    <div class="l-header__inner">
      @if (has_nav_menu('desktop_menu_left'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('desktop_menu_left') }}">
          {!! wp_nav_menu(['theme_location' => 'desktop_menu_left', 'menu_class' => 'c-nav__list', 'echo' => false]) !!}
        </nav>
      @endif
      <a class="ui-link c-logo__wrapper" href="{{ home_url('/') }}">
        {{-- <img class="c-logo--white" src="@asset('/images/logo-white1.png')" alt="">
        <img class="c-logo--gold" src="@asset('/images/logo-gold.png')" alt=""> --}}
        @include('icon::logo')
      </a>
      @if (has_nav_menu('desktop_menu_right'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('desktop_menu_right') }}">
          {!! wp_nav_menu(['theme_location' => 'desktop_menu_right', 'menu_class' => 'c-nav__list', 'echo' => false]) !!}
        </nav>
      @endif
    </div>
  </div>
</header>

@include('atoms.hamburger')

<div id="c-mobile-menu" class="js-mobile-menu">
  <img src="@asset('/images/mobile-menu-accent.png')" alt="" class="c-mobile-menu-accent" loading="lazy">
  @include('molecules.custom-menu')
  <p class="c-mobile-menu__text">{!! $contact['address'] ?? '' !!}</p>
  <a href="mailto:{{ $contact['mail'] }}" class="c-mobile-menu__text">{!! $contact['mail'] ?? '' !!}</a>
  <a href="tel:{{ $contact['phone'] }}" class="c-mobile-menu__text">{!! $contact['phone'] ?? '' !!}</a>
  <div class="c-mobile__socials-wrapper">
    <a href="{{ $socials['instagram']['url'] }}" target="_blank" class="c-mobile-social">
      @include('icon::instagram')
    </a>
    <a href="{{ $socials['facebook']['url'] }}" target="_blank" class="c-mobile-social">
      @include('icon::facebook')
    </a>
    <a href="{{ $socials['youtube']['url'] }}" target="_blank" class="c-mobile-social">
      @include('icon::youtube')
    </a>
  </div>
</div>
