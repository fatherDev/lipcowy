@php
$subtitle = $fields['subtitle'] ?? '';
$title = $fields['title'] ?? '';
$img = $fields['img'] ?? '';

$currentUser = wp_get_current_user();
$userName = $currentUser->user_nicename ? $currentUser->user_nicename : $currentUser->name;
@endphp

@extends('organisms.app-panel')

@section('aside-content')
  <h2 class="l-panel-aside__title">Witaj, {{ $userName }}</h2>

  @include('organisms.aside-nav')
  @include('icon::panel-blob2')
@endsection

@section('content')
  <div class="c-page-login">
    <span class="t-typo-3">{{ $subtitle }}</span>
    <h1 class="c-page-login__title">{!! $title !!}</h1>

    @include('atoms.rounded-img', [
        'class' => 'c-page-login__rounded-img',
        'img' => $img,
    ])
  </div>
@endsection
