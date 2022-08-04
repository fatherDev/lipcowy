{{--
  Template Name: Hotel
--}}

@php
$hero = $fields['hero'] ?? '';
$animalSection = $fields['animal_section'] ?? '';
$gallery = $fields['gallery'] ?? '';
$stickySection = $fields['info_cards'] ?? '';
$anchorsSection = $fields['anchors_section'] ?? '';
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
      'class' => 'z-2'
  ])

  @include('organisms.sticky-section', [
      'ACF' => $stickySection,
  ])

  @include('organisms.multiple-anchors', [
      'ACF' => $anchorsSection,
  ])

  @include('organisms.newsletter-section', [
      'class' => 'z-1',
  ])

  @include('organisms.testimonials', [
      'data' => $testimonials,
      'accent' => 'with-big-blob',
  ])
@endsection
