{{-- /
  Template Name: Kontakt
  / --}}

@php
$content = $fields['content'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.single-contact-content', [
      'data' => $content,
  ])
@endsection
