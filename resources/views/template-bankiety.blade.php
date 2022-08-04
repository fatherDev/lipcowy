{{--
  Template Name: Bankiety
--}}

@php
$hero = $fields['hero'] ?? '';
$animalSection = $fields['animal_section'] ?? '';
$gallery = $fields['gallery'] ?? '';
$stickySection = $fields['info_cards'] ?? '';
$menuCards = $fields['menu_section'] ?? '';
$gallery2 = $fields['gallery2'] ?? '';
$hallsSection = $fields['halls'] ?? '';
$testimonials = $fields['testimonials'] ?? '';
@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.hero', [
      'data' => $hero,
      'accent' => 'big-blob',
  ])

  @include('organisms.animal-section', [
      'ACF' => $animalSection,
      'class' => 'z-1',
  ])

  @include('organisms.media-gallery-section', [
      'data' => $gallery,
      'accent' => 'spoon-big-blob-1',
  ])

  @include('organisms.sticky-section', [
      'ACF' => $stickySection,
      'accent' => 'bird-with-big-leaf',
  ])

  @include('organisms.short-menu-cards-section', [
      'data' => $menuCards,
      'class' => 'z-2',
  ])

  @include('organisms.media-gallery-section', [
      'data' => $gallery2,
  ])

  @include('organisms.slider-section', [
      'data' => $hallsSection,
  ])

  @include('organisms.newsletter-section', [
      'class' => 'z-1',
  ])

  @include('organisms.testimonials', [
      'data' => $testimonials,
      'accent' => 'with-big-blob',
  ])
@endsection
