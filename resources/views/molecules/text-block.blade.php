@php
$data = $data ?? '';
$HTMLElement = $HTMLElement ?? 'h2';
@endphp
<div data-scroll class="c-text-block {{ $class ?? '' }}" data-scroll-offset="30%">
  @if (!empty($data['title']))
    <{{ $HTMLElement }} data-scroll data-scroll-offset="30%" class="c-text-block__title ui-fade-in">
      {!! $data['title'] !!}</{{ $HTMLElement }}>
  @endif

  @if (!empty($data['desc1']))
    <p data-scroll data-scroll-offset="30%" class="c-text-block__desc c-text-block__desc--big ui-fade-in">
      {!! $data['desc1'] !!}</p>
  @endif

  @if (!empty($data['desc2']))
    <div data-scroll data-scroll-offset="30%" class="c-text-block__desc ui-fade-in" style="--i:2">{!! $data['desc2'] !!}
    </div>
  @endif
</div>
