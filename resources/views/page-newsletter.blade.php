@extends('organisms.app')
@section('content')
  <section data-scroll-section class="c-newsletter">
    <div class="l-inner">

      <div class="c-newsletter__wrapper">
        <div class="c-newsletter__container">
          {!! do_shortcode('[newsletter]') !!}

          @include('atoms.button', [
              'class' => 'c-newsletter__btn',
              'text' => 'Powrót do strony głównej',
              'href' => home_url('/'),
              'isActive' => true,
          ])
        </div>
      </div>

    </div>

    <img class="c-news-hero__blob" src="@asset('../images/news-blob.svg')" loading="lazy">
    <img class="c-news-hero__blob--green" src="@asset('../images/news-green-blob.svg')" loading="lazy">
    <img class="c-news-hero__leaf" src="@asset('../images/cropped-big-leaf.png')" loading="lazy">
  </section>
@endsection
