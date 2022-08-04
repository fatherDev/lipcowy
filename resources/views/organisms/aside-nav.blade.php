@php

$categories = get_categories([
    'taxonomy' => 'client-posts-taxonomy',
]);

$query = new WP_Query([
    'post_type' => 'client-posts',
]);

$allPosts = $query->posts;

@endphp


@if (!empty($categories))
  <nav class="c-aside-nav">
    <ul class="c-aside-nav__list">
      @foreach ($allPosts as $post)
        @php
          $isFeatured = get_field('is_featured', $post);
        @endphp
        @if ($isFeatured)
          <li class="c-aside-nav__item {{ is_single($post->ID) ? 'c-aside-nav__item--active' : '' }}"><a
              href="{{ get_the_permalink($post) }}">{{ $post->post_title }}</a></li>
        @endif
      @endforeach

      @foreach ($categories as $category)
        @php
          $query = new WP_Query([
              'post_type' => 'client-posts',
              'tax_query' => [
                  [
                      'taxonomy' => 'client-posts-taxonomy',
                      'field' => 'id',
                      'terms' => $category->term_id,
                  ],
              ],
          ]);
          $posts = $query->posts;
        @endphp



        <li class="c-aside-nav__subtitle">{{ $category->name }}</li>
        @foreach ($posts as $post)
          <li class="c-aside-nav__item {{ is_single($post->ID) ? 'c-aside-nav__item--active' : '' }}"><a
              href="{{ get_the_permalink($post) }}">{{ $post->post_title }}</a></li>
        @endforeach
      @endforeach
    </ul>
  </nav>
@endif
