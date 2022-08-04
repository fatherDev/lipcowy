@php
$gallery = get_field('gallery_archive', 'option') ?? false;

$args = [
    'taxonomy' => 'gallery-taxonomy',
    'orderby' => 'name',
    'order' => 'ASC',
];

$cats = get_categories($args);

$name = null;

if (is_archive() && !is_tax()) {
    $name = 'Wszystko';
} else {
    $term = get_queried_object();
    $name = $term->name;
}

@endphp

@extends('organisms.app')

@section('content')
  @include('organisms.gallery-hero', ['data' => $gallery])

  <section class="c-gallery-page" data-scroll-section>
    <div class="l-inner">

      {{-- Category button --}}
      @if (!empty($cats))
        <button class="c-gallery-page__cat-btn js-cat-btn">
          <span>Kategoria:</span>
          <span class="c-gallery-page__cat">{{ $name }}</span>
          @include('icon::arrow')
        </button>
      @endif

      {{-- Posts --}}
      <div class="l-grid">
        @while (have_posts())
          @php(the_post())
          @include('molecules.post-card')
        @endwhile
      </div>

      {{-- Post pagination --}}
      <div class="c-gallery-page__pagination">
        {!! paginate_links([
    'base' => get_pagenum_link(1) . '%_%',
    'format' => 'page/%#%/',
    'prev_text' => __('<'),
    'next_text' => __('>'),
]) !!}
      </div>

    </div>

    {{-- Accents and blobs --}}
    @include('icon::archive-big-blob', ['class' => 'c-gallery-page__big-blob'])
    @include('icon::ring', ['class' => 'c-gallery-page__ring'])
    <img class="c-gallery-page__cutlery" src="@asset('./images/cutlery.png')" loading="lazy">

  </section>

  @include('molecules.gallery-categories')
@endsection
