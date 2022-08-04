@extends('organisms.app')

@section('content')
  @include('organisms.blog-hero')
  @include('organisms.posts-wrapper', [
      'class' => 'l-posts__inner--three-cols',
      'accent' => 'circle-right',
  ])
@endsection
