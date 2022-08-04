@php
$heroACF = $fields['hero'] ?? '';
$galleryACF = $fields['gallery'] ?? '';
$animalSection = $fields['animal_section'] ?? '';
$testimonials = $fields['testimonials'] ?? '';
$instagramSection = $fields['instagram_section'] ?? '';
$menuCardsACF = $fields['menu_section'] ?? '';
$stickySection = $fields['info_cards'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.home-hero', [
      'data' => $heroACF,
  ])

  @include('organisms.animal-section', [
      'ACF' => $animalSection,
      'accent' => 'with-two-blobs',
      'class' => 'z-1',
  ])

  @include('organisms.media-gallery-section', [
      'data' => $galleryACF,
      'accent' => 'spoon-big-blob-1',
  ])

  @include('organisms.sticky-section', [
      'ACF' => $stickySection,
      'accent' => 'bird-with-big-leaf',
  ])

  @include('organisms.short-menu-cards-section', [
      'data' => $menuCardsACF,
      'class' => 'z-2',
  ])

  @include('organisms.testimonials', [
      'data' => $testimonials,
      'accent' => 'with-big-blob',
  ])

  @include('organisms.instagram-section', [
      'title' => $instagramSection['title'] ?? '',
      'subtitle' => $instagramSection['subtitle'] ?? '',
  ])
@endsection
