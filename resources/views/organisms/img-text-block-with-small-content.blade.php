@php
$class = $class ?? '';
$accent = $accent ?? '';
$img = $data['img'] ?? '';
$intro = $data['intro'] ?? '';
$textBlocks = $data['text_blocks'] ?? [];
@endphp

@if ($img || $intro || $textBlock)
  <section data-scroll-section class="c-img-text-block-with-small-content{{ $class ? ' ' . $class : '' }}">
    <div class="l-inner">
      <div class="c-img-text-block-with-small-content__inner l-grid">

        {{-- Left col --}}
        <div class="c-img-text-block-with-small-content__col c-img-text-block-with-small-content__col--left">
          <div class="c-img-text-block-with-small-content__text-block-wrapper">

            {{-- Intro --}}
            @include('molecules.text-block', [
                'data' => $intro,
                'class' => 'c-img-text-block-with-small-content__text-block',
            ])

            {{-- Small blocks --}}
            @if ($textBlocks)
              <div class="c-img-text-block-with-small-content__blocks-wrapper">
                @foreach ($textBlocks as $block)
                  <div class="c-img-text-block-with-small-content__block ui-fade-in" data-scroll data-scroll-offset="30%"
                    data-scroll-target=".c-img-text-block-with-small-content__blocks-wrapper"
                    style="--i:{{ $loop->index }}">
                    <span class="c-img-text-block-with-small-content__block-title">{!! $block['title'] ?? '' !!}</span>
                    <p class="c-img-text-block-with-small-content__block-desc">{!! $block['desc'] ?? '' !!}</p>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>

        {{-- Right col --}}
        <div data-scroll
          class="c-img-text-block-with-small-content__col c-img-text-block-with-small-content__col--right">
          <div class="c-img-text-block__img-wrapper ui-img-inside-border ui-responsive-img">

            {{-- Image --}}
            <img src="{{ $img['url'] ?? '' }}" alt="{{ $img['alt'] ?? '' }}" class="c-img-text-block__img"
              loading="lazy">
          </div>
        </div>
      </div>
    </div>

    {{-- Accents --}}
    @if ($accent === 'top-left-blobs-with-big-blob-mobile-only')
      @include('icon::bean-blob', [
          'class' => 'c-img-text-block-with-small-content__accent c-img-text-block-with-small-content__accent--bean-blob',
      ])
      @include('icon::ring', [
          'class' => 'c-img-text-block-with-small-content__accent c-img-text-block-with-small-content__accent--ring',
      ])

      @include('icon::big-blob-2', [
          'class' => 'c-img-text-block-with-small-content__accent c-img-text-block-with-small-content__accent--big-blob',
      ])
    @endif
  </section>
@endif
