@php
global $post;
$title = get_field('blog_title', 'option') ?? get_the_title();
$desc = get_field('text_block', 'option') ?? false;
@endphp

<section data-scroll-section class="c-blog-hero">
  <div class="l-inner">
    <div class="c-blog-hero__inner">
      <h2 class="c-blog-hero__title js-animated-text">{!! $title !!}</h2>
      <p data-scroll class="c-blog-hero__desc ui-fade-in">{!! $desc !!}</p>
    </div>
  </div>
  <img class="c-text-block__bird" src="@asset('../images/bird.png')" loading="lazy">
  <img class="c-text-block__circle-right" src="@asset('/images/half-circle-right.svg')" alt="" loading="lazy">
  <img class="c-news-hero__leaf" src="@asset('../images/cropped-big-leaf.png')" loading="lazy">
</section>
