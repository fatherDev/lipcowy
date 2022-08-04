@php
$hero = $fields['hero'] ?? '';

$title = $hero['title'] ?? false;
$subtitle = $hero['subtitle'] ?? false;
$img = $hero['img'] ?? false;

$currentUser = wp_get_current_user();
@endphp


@extends('organisms.app-panel')

@section('aside-content')
  @if (!empty($currentUser->user_lastname) && !empty($currentUser->user_firstname))
    <h2 class="l-panel-aside__title">Witaj, {{ $currentUser->user_firstname }} {{ $currentUser->user_lastname }}</h2>
  @else
    <h2 class="l-panel-aside__title">Witaj, {{ $currentUser->display_name }}</h2>
  @endif

  @include('organisms.aside-nav')
  @include('icon::panel-blob2')
@endsection

@section('content')
  <article class="c-single-client-post">
    <div>
      @if ($subtitle)
        <span class="t-typo-menu">{{ $subtitle }}</span>
      @endif
      <h1 class="t-typo-h4">{{ empty($title) ? the_title() : $title }}</h1>
      @if ($img)
        <div class="o-top-40">
          <picture class="ui-img-full">
            <source srcset='{{ $img['url'] ?? '' }}' media='(min-width: 768px)' width='{{ $img['width'] ?? '' }}'
              height='{{ $img['height'] ?? '' }}'>
            <img class='ui-img-full' src='{{ $img['sizes']['medium_large'] ?? '' }}' alt='{{ $img['alt'] ?? '' }}'
              width='{{ $img['sizes']['medium_large-width'] ?? '' }}'
              height='{{ $img['sizes']['medium_large-height'] ?? '' }}' loading='lazy'>
          </picture>
        </div>
      @endif
    </div>
    <div class="c-single-client-post__content">
      {!! the_content() !!}

    </div>
  </article>
@endsection
