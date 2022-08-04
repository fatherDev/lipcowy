@php
$class = $class ?? '';
@endphp

@if (!empty($ACF))
  <section data-scroll-section class="c-multiple-anchors{{ $class ? ' ' . $class : '' }}">
    <div class="l-inner">
      <div class="c-multiple-anchors__inner">
        {{-- Text block --}}
        @if ($ACF['text_block'] ?? '')
          @include('molecules.text-block', [
              'data' => $ACF['text_block'] ?? '',
              'class' => 'c-multiple-anchors__text-block',
          ])
        @endif
        @if ($ACF['mail_repeater'] ?? '')
          <p class="c-multiple-anchors__label">e-mail:</p>
          <div class="c-multiple-anchors__wrapper">
            @foreach ($ACF['mail_repeater'] as $item)
              <a class="c-multiple-anchors__link" href="mailto:{{ $item['mail'] ?? '' }}">
                {{ $item['mail'] ?? '' }}
              </a>
            @endforeach
          </div>
        @endif
        @if ($ACF['phone_repeater'] ?? '')
          <p class="c-multiple-anchors__label">telefon:</p>
          <div class="c-multiple-anchors__wrapper">
            @foreach ($ACF['phone_repeater'] as $item)
              <a class="c-multiple-anchors__link c-multiple-anchors__link--no-border"
                href="mailto:{{ $item['phone'] ?? '' }}">
                {{ $item['phone'] ?? '' }}
              </a>
            @endforeach
          </div>
        @endif
        @if ($ACF['anchor_repeater'] ?? '')
          @foreach ($ACF['anchor_repeater'] as $item)
            <p class="c-multiple-anchors__label">{{ $item['label'] ?? '' }}</p>
            <div class="c-multiple-anchors__wrapper">
              @foreach ($item['links_repeater'] as $link)
                <a class="c-multiple-anchors__link" href="{{ $link['link']['url'] ?? '' }}" target="_blank">
                  {{ $link['link']['title'] ?? '' }}
                </a>
              @endforeach
            </div>
          @endforeach
        @endif
      </div>
    </div>
    @include('icon::small-blob-with-circle', ['class' => 'c-multiple-anchors__blob'])
    @include('icon::right-green-blob', ['class' => 'c-multiple-anchors__blob-right'])
    <img class="c-multiple-anchors__accent c-multiple-anchors__accent--big-leaf" src="@asset('images/big-leaf.png')"
      alt="Wielki zielony liść" aria-hidden="true" loading="lazy">
  </section>
@endif
