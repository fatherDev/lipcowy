{{--
  Template Name: Catering
--}}

@php
$hero = $fields['hero'] ?? '';
$animalSection = $fields['animal_section'] ?? '';
$menuCards = $fields['menu_section'] ?? '';
$gallery = $fields['gallery'] ?? '';
$smallTextBlocksWithImg = $fields['small_text_blocks_with_img'] ?? '';
$imgTextBlock = $fields['img_text_block'] ?? '';
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

  @include('organisms.short-menu-cards-section', [
      'data' => $menuCards,
      'class' => 'z-2',
  ])

  @include('organisms.media-gallery-section', [
      'data' => $gallery,
  ])

  @include('organisms.img-text-block-with-small-content', [
      'data' => $smallTextBlocksWithImg,
  ])

  @include('molecules.img-text-block', [
      'ACF' => $imgTextBlock,
      'isSection' => true,
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
