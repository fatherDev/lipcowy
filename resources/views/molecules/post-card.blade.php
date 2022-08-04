<div class="c-post-card">
  <a class="c-post-card__box" href="{{ get_permalink() }}">
    <div class="c-post-card__img">
      <img class=" ui-img-full" src="{{ get_the_post_thumbnail_url() }}" alt="{{ the_title() }}" loading="lazy">
    </div>

    <h2 class="t-typo-p1 ui-color--t-medium o-top-20">{{ the_title() }}</h2>
  </a>

</div>
