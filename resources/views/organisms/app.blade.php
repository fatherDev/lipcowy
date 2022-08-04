@include('organisms.header')

<div data-scroll-container>

  <main class="l-main">
    @yield('content')
  </main>


  @include('organisms.footer')

</div>

@include('molecules.floating-buttons')
