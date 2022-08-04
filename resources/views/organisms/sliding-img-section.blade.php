<section data-scroll-section class="l-sliding-img">
  <div class="l-inner">
    <div class="l-sliding-img__inner">

      {{-- Text block --}}
      @if ($ACF['text_block'] ?? '')
        @include('molecules.text-block', [
            'data' => $ACF['text_block'] ?? '',
            'class' => 'l-sliding-img__text-block',
        ])
      @endif

      {{-- Sliding image --}}
      @include('organisms.text-blocks-with-sliding-img', [
          'ACF' => $ACF['img_text_block'] ?? '',
      ])

    </div>
  </div>

  {{-- Smaller text block --}}
  <div class="l-sliding-img__bg--secondary">
    <div class="l-inner">
      <div class="l-sliding-img__wrapper l-grid">
        <div class="l-sliding-img__col l-sliding-img__col--left">
          <div class="l-sliding-img__col-title js-animated-text">
            {!! $ACF['smaller_text_block']['title'] !!}
          </div>
          <p data-scroll data-scroll-offset="30%" class="l-sliding-img__col-subtitle ui-fade-in">{!! $ACF['smaller_text_block']['desc1'] !!}
          </p>
          <p data-scroll data-scroll-offset="30%" class="l-sliding-img__col-desc ui-fade-in">{!! $ACF['smaller_text_block']['desc2'] !!}</p>

          @include('atoms.circle-button', [
              'href' => $ACF['link']['url'],
              'data' => $ACF['link'],
          ])
        </div>
      </div>
    </div>
  </div>

  {{-- Accent --}}
  <img class="l-sliding-img__leaf" src="@asset('../images/big-leaf-2.png')" loading="lazy">
</section>
