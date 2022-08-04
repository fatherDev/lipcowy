@php
global $posts;
$accent = $accent ?? '';
@endphp

<section data-scroll-section class="l-posts">
  <div class="l-inner">
    <div class="l-posts__inner l-grid {{ $class ?? '' }}">
      @foreach ($posts as $post)
        <a href="{{ get_the_permalink($post->ID) }}" class="c-single-post">
          <div class="c-single-post__img-wrapper">
            <img class="c-single-post__img ui-responsive-img" src="{{ get_the_post_thumbnail_url($post->ID) }}"
              alt="{{ $post->post_title }}" loading="lazy">
          </div>
          <p class="c-single-post__label">{{ get_field('news_label', $post->ID) ?? '' }}</p>
          <p class="c-single-post__title">{{ $post->post_title ?? '' }}</p>
        </a>
      @endforeach
    </div>
  </div>
  <img class="l-posts__blob" src="@asset('/images/big-light-blob.svg')" loading="lazy">

  @if ($accent === 'circle-left')
    <img class="l-posts__circle" src="@asset('/images/small-semi-circle.svg')" loading="lazy">
  @endif

  @if ($accent === 'circle-right')
    <img class="l-posts__circle-right" src="@asset('/images/circle-with-blob.svg')" loading="lazy">
  @endif
</section>
