@php
$hero = $fields['single_post_hero'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.media-gallery-section', [
      'data' => $hero,
      'class' => 'c-single-post__hero',
      'accent' => 'two-top-blobs',
  ])

  <section data-scroll-section>
    <img class="c-single-post__blob" src="@asset('../images/single-post-gallery-blob.svg')" loading="lazy">
    <div class="l-inner">
      <div class="c-single-post__content c-single-post__content--with-padding">
        {{ the_content() }}
      </div>
    </div>
    <img class="c-single-post__bottom-accent--1" src="@asset('../images/bottom-semi-circle.svg')" loading="lazy">
    <img class="c-single-post__bottom-accent--2" src="@asset('../images/bottom-green-blob.svg')" loading="lazy">
    <img class="c-single-post__bottom-accent--3" src="@asset('../images/single-post-gallery-blob.svg')" loading="lazy">
    <img class="c-single-post__accent--1" src="@asset('../images/half-green-blob.svg')">
    <img class="c-single-post__accent--2" src="@asset('../images/small-semi-circle.svg')" loading="lazy">
  </section>
@endsection
