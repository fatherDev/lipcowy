@php
$content = $fields['content'] ?? '';
$data = $data ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.single-menu-content', [
      'data' => $content,
      'menus' => $calendars,
  ])
@endsection
