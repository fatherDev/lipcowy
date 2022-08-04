@php
$content = $fields['content'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.single-menu-content', [
      'data' => $content,
  ])
@endsection
