@php
$data = $data ?? false;
$random = rand(1, 1000);
@endphp

@if ($data)

  <section class="c-grid-gallery {{ $class ?? '' }}" data-scroll-section>
    <div class="l-inner">
      <ul class="c-grid-gallery__list l-grid">
        @foreach ($data as $item)
          <li class="c-grid-gallery__item ui-img-inside-border">
            <a href="{{ $item['url'] }}" class="glightbox" data-gallery="gallery{{ $random }}">
              <img class="c-grid-gallery__img ui-img-full" src="{{ $item['url'] }}" alt="{{ $item['alt'] ?? '' }}"
                loading="lazy">
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </section>
@endif
