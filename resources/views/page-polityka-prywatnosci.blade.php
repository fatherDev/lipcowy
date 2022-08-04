@extends('organisms.app')

@section('content')
  <section data-scroll-section class="l-privacy">
    <img class="c-news-hero__blob" src="@asset('../images/news-blob.svg')">
    <img class="c-news-hero__blob--green" src="@asset('../images/news-green-blob.svg')">
    <img class="c-news-hero__leaf" src="@asset('../images/cropped-big-leaf.png')">
    <div class="l-inner">
      <div class="l-privacy__inner">
        <h1 class="l-privacy__title">{{ wp_title(false) }}</h1>
        <div class="l-privacy__content">
          {!! the_content() !!}
        </div>
      </div>
    </div>
    @include('icon::small-blob-with-circle', ['class' => 'c-multiple-anchors__blob'])
    <img class="c-single-post__bottom-accent--2" src="@asset('../images/bottom-green-blob.svg')">
  </section>
@endsection
