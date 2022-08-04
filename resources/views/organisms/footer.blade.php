@include('organisms.cta')

<footer data-scroll-section class="l-footer">
  {{-- LOGO --}}
  <div class="l-footer__logo">
    <a href="{{ home_url('/') }}">
      <img height="100px" width="100px" src="@asset('/images/logo-gold.png')" alt="logo {{ $siteName }}" loading="lazy">
    </a>
  </div>

  {{-- MENU --}}
  @if (has_nav_menu('footer_menu'))
    <nav class="c-footer-nav" aria-label="{{ wp_get_nav_menu_name('footer_menu') }}">
      {!! wp_nav_menu(['theme_location' => 'footer_menu', 'menu_class' => 'c-footer-nav__list', 'echo' => false, 'container' => false]) !!}
    </nav>
  @endif

  {{-- BOTTOM BAR --}}
  <div class="l-inner">
    <div class="l-grid o-desk-bot-30 o-desk-top-35 o-bot-20 o-top-20">
      <div class="l-footer__privacy">
        <span>&copy; {{ $siteName }} {{ date('Y') }}</span>
        <a href="{{ get_privacy_policy_url() }}">Polityka prywatności</a>
      </div>

      <div class="l-footer__socials">
        @include('atoms.socials-list')
      </div>

      <div class="l-footer__prograffing">
        <span>
          Projektowanie
        </span>
        <a href="https://prograffing.pl/strony-internetowe">
          @include('icon::prograffing-logo', ['class' => 'l-footer__prograffing-logo'])
        </a>
      </div>
    </div>
  </div>
</footer>
