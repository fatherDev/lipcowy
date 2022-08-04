@php
$anchors = $fields['anchors'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.news-hero')


  <section data-scroll-section>
    <img class="c-single-post__blob" src="@asset('../images/single-post-gallery-blob.svg')" loading="lazy">
    <div class="l-inner">
      <div class="c-single-post__content">
        {{ the_content() }}
      </div>
    </div>
  </section>

  @include('organisms.multiple-anchors', ['ACF' => $anchors])
@endsection
