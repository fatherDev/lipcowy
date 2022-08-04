{{--
    Template Name: Wesela
--}}

@php
$hero = $fields['hero'] ?? '';
$animalSection = $fields['animal_section'] ?? '';
$stickySection = $fields['info_cards'] ?? '';
$gallery = $fields['gallery'] ?? '';
$hallsSection = $fields['halls'] ?? '';
$gallery2 = $fields['gallery2'] ?? '';
$imgTextBlock = $fields['img_text_block'] ?? '';
$slidingImg = $fields['sliding_img'] ?? '';
$stickySection2 = $fields['info_cards2'] ?? '';
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

  @include('organisms.sticky-section', [
      'ACF' => $stickySection,
  ])

  @include('organisms.media-gallery-section', [
      'data' => $gallery,
  ])

  @include('organisms.slider-section', [
      'data' => $hallsSection,
  ])

  @include('organisms.media-gallery-section', [
      'data' => $gallery2,
  ])

  @include('molecules.img-text-block', [
      'ACF' => $imgTextBlock,
      'isSection' => true,
  ])

  @include('organisms.sliding-img-section', [
      'ACF' => $slidingImg,
  ])


  @include('organisms.sticky-section', [
      'ACF' => $stickySection2,
      'class' => 'ui-m-0',
  ])

  @include('organisms.newsletter-section', [
      'class' => 'z-1 ui-m-0',
  ])

  @include('organisms.testimonials', [
      'data' => $testimonials,
      'accent' => 'with-big-blob',
  ])
@endsection
