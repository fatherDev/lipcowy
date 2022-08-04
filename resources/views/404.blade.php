@extends('organisms.app')
@section('content')
  <section data-scroll-section class="c-404">
    <div class="c-404__wrapper">
      <span class="c-404__heading">404</span>
      <h1 class="c-404__title">Strona o podanym adresie nie istnieje</h1>
      <a href="{{ home_url('/') }}" class="c-404__btn">Powrót do strony głównej</a>
    </div>

    {{-- Accents --}}
    <img class="c-404__accent c-404__accent--big-leaf" src="@asset('images/big-leaf.png')" alt="Wielki zielony liść"
      aria-hidden="true">
    <img class="c-404__accent c-news-hero__blob--green" src="@asset('../images/news-green-blob.svg')">
    <img class="c-404__accent c-news-hero__blob" src="@asset('../images/news-blob.svg')">
    @include('icon::cropped-ballon-and-circle-blob', [
        'class' => 'c-404__accent c-404__accent--left-bottom-blobs',
    ])
  </section>
@endsection
