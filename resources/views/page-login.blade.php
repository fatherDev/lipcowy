@php
$repeater = $fields['info_repeater'] ?? '';
$subtitle = $fields['subtitle'] ?? '';
$title = $fields['title'] ?? '';
@endphp

@extends('organisms.app-panel')

@section('aside-content')
  @if (!empty($repeater))
    <div class="l-panel-aside__list">
      @foreach ($repeater as $item)
        <h2 class="t-typo-p1 ui-color--primary-dark o-bot-20">{{ $item['title'] }}</h2>
        <p class="t-typo-p2 ui-color--white o-bot-40">{!! $item['desc'] !!}</p>
      @endforeach
    </div>
  @endif
@endsection

@section('content')
  <div class="c-page-login">
    <span class="t-typo-3">{{ $subtitle }}</span>
    <h1 class="c-page-login__title">{!! $title !!}</h1>

    <div class="c-page-login__form">
      @if (!is_user_logged_in())
        {{ the_content() }}
      @else
        <p>Jesteś już zalogowany</p>
        <a href="{{ home_url('/panel') }}" class="c-page-login__btn">Przejdź do panelu</a>
      @endif

    </div>
  </div>
@endsection
