@php
$currentUser = wp_get_current_user();
$userName = $currentUser->user_nicename ? $currentUser->user_nicename : $currentUser->name;
@endphp

<div class="l-app-panel" data-scroll-container>

  @include('atoms.hamburger')

  <div class="l-app-panel__bg"></div>


  <div class="l-inner">
    <div class="l-grid">

      <aside id="panel-aside" class="l-panel-aside js-mobile-menu ">
        <a class="l-app-panel__back" href="{{ home_url('/') }}">
          @include('icon::back-arrow')
          <span>Powrót do strony głównej</span>

        </a>
        <div class="l-panel-aside__inside js-inside-scroll-outer " data-scroll data-scroll-sticky
          data-scroll-target="#panel-aside" data-scroll-position="top">
          <div class="l-panel-aside__wrapper js-inside-scroll-inner">
            @yield('aside-content')
          </div>
        </div>

        @include('icon::panel-blob2')


      </aside>


      <main class="l-app-panel__main">

        @if (is_user_logged_in())
          <a class="l-app-panel__logout" href="{{ home_url('/logout') }}">
            <span>
              {{ $userName }}
            </span>
            @include('icon::logout')

          </a>
        @endif

        @yield('content')

        @include('icon::panel-blob1')
        <img class="l-app-panel__decor" src="@asset('/images/panel-bg.png')">
      </main>


    </div>
  </div>


</div>
