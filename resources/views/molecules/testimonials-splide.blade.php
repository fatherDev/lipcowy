@if (!empty($data['repeater']))
  <div class="c-testimonials__splide splide js-testimonials-splide">
    <div class="c-testimonials__track splide__track ">
      <ul class="c-testimonials__list splide__list ">

        @foreach ($data['repeater'] as $item)
          @if (!empty($item['desc']))
            <li class="c-testimonials__item splide__slide">
              <div class="l-grid">
                <div class="c-testimonials__img-wrapper">
                  @if (!empty($item['img']))
                    <img class="c-testimonials__img ui-img-full" src="{{ $item['img']['url'] }}"
                      alt="{{ $item['img']['alt'] }}" loading="lazy">
                  @else
                    <div class="c-testimonials__error"></div>
                  @endif
                </div>

                <div
                  class="c-testimonials__box {{ str_word_count($item['desc']) > 30 ? 'c-testimonials__box--big' : '' }}">
                  <img src="@asset('/images/quote.png')" loading="lazy">
                  <p class="o-top-25 o-tablet-top-30 ">
                    {!! $item['desc'] !!}</p>
                  @if (!empty($item['name']))
                    <p class="c-testimonials__name">{{ $item['name'] }}</p>
                  @endif
                  @if (!empty($item['date']))
                    <p class="ui-color--t-light">{{ $item['date'] }}</p>
                  @endif
                </div>
              </div>
            </li>
          @endif
        @endforeach

      </ul>
      <img class="c-testimonials__full-circle" src="@asset('/images/full-circle.svg')" loading="lazy">
    </div>
    <div class="l-grid">
      <div class="c-testimonials__progress-wrapper">
        @include('atoms.progress', [
            'class' => 'c-testimonials__progress',
            'barClass' => 'js-testimonials-bar',
        ])
      </div>

    </div>
  </div>

@endif
