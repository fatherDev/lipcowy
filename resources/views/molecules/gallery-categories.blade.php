@if (!empty($cats))
  <div class="c-gallery-categories js-cats">
    <button class="c-gallery-categories__btn js-close-cats">
      @include('icon::close-icon')
    </button>
    <ul class="c-gallery-categories__list">
      <li class="c-gallery-categories__item">
        <span class="c-gallery-categories__index">01</span>
        <a class="c-gallery-categories__box" href="{{ home_url('/galeria') }}">Wszystko</a>
      </li>

      @foreach ($cats as $item)
        <li class="c-gallery-categories__item">
          <span class="c-gallery-categories__index">0{{ $loop->index + 2 }}</span>
          <a class="c-gallery-categories__box" href="{{ get_category_link($item) }}">{{ $item->name }}</a>
        </li>
      @endforeach

    </ul>
  </div>
@endif
