@php
$heroACF = $fields['hero'] ?? '';
$hallsSection = $fields['halls'] ?? '';
$gallerySection = $fields['gallery'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.single-sale-hero', [
      'data' => $heroACF,
      'accent' => 'leaf-with-left-blobs',
  ])

  @include('organisms.slider-section', [
      'data' => $hallsSection,
  ])


  @include('organisms.slider-section', [
      'data' => $gallerySection,
  ])
@endsection
