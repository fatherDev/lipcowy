@php
$heroACF = $fields['hero'] ?? '';

@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.hero', [
      'data' => $heroACF,
  ])

  @include('organisms.newsletter-section')
@endsection
