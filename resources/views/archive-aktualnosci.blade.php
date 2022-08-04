@php
$news = get_field('news_hero', 'option') ?? false;
$iconTextBlock = get_field('icon_text_block', 'option') ?? false;
$accent = $accent ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.hero', [
      'data' => $news,
      'showSocialMedia' => false,
      'class' => 'z-2',
  ])
  <section data-scroll-section class="z-1 ui-relative">
    @include('molecules.icon-text-block', [
        'ACF' => $iconTextBlock,
        'withoutPadding' => empty($accent) ? true : false,
        'accent' => 'bird-with-three-blobs',
        'class' => 'z-1',
    ])
  </section>
  @include('organisms.posts-wrapper', ['accent' => 'circle-left'])
@endsection
