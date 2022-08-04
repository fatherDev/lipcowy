@php
$img = get_the_post_thumbnail_url();
@endphp

<section data-scroll-section class="c-news-hero">
  <div class="l-inner">
    <div class="c-news-hero__inner">
      <h1 class="c-news-hero__title js-animated-text">{!! get_the_title() !!}</h1>

      {{-- Rounded image --}}
      @include('atoms.rounded-img', [
          'class' => 'c-single-news-hero__rounded-img',
          'imgUrl' => $img,
      ])

    </div>
  </div>

  <img class="c-news-hero__blob" src="@asset('../images/news-blob.svg')" loading="lazy">
  <img class="c-news-hero__blob--green" src="@asset('../images/news-green-blob.svg')" loading="lazy">
  <img class="c-news-hero__leaf" src="@asset('../images/cropped-big-leaf.png')" loading="lazy">
  @include('icon::cropped-ballon-and-circle-blob', [
      'class' => 'c-single-sale-hero__accent c-single-sale-hero__accent--left-bottom-blobs',
  ])
</section>
