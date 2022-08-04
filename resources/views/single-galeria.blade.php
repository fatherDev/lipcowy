@php
$content = $fields['content'] ?? '';

@endphp
@extends('organisms.app')

@section('content')
  <div class="l-single-galeria">

    <div class="c-gallery-hero z-3" data-scroll-section>
      <div class="l-inner">
        <h1 class="c-gallery-hero__title ui-color--t-medium">{{ the_title() }}</h1>
      </div>

    </div>

    @if (!empty($content))
      @foreach ($content as $item)
        @if ($item['acf_fc_layout'] == 'gallery')
          @include('organisms.media-gallery-section', [
              'data' => $item['gallery'],
              'class' => 'ui-mt-0 z-4',
              'accent' => 'gallery-blobs',
          ])
        @elseif ($item['acf_fc_layout'] == 'grid_gallery')
          @include('organisms.grid-gallery', [
              'data' => $item['grid_gallery'],
              'class' => $loop->index > 2 ? 'z-3' : 'z-4',
          ])
        @elseif ($item['acf_fc_layout'] == 'video')
          @include('organisms.media-gallery-section', [
              'data' => $item['video'],
              'class' => 'ui-mt-0 z-2',
              'accent' => 'gallery-blobs',
          ])
        @elseif ($item['acf_fc_layout'] == 'yt_video')
          <section class="c-yt-video z-1" data-scroll-section>
            <div class="l-inner">
              {!! $item['yt_video'] !!}
            </div>

          </section>
        @endif
      @endforeach


  </div>
  @endif


@endsection
