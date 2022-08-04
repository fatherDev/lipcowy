@php
$yearsRepeater = $data['year_repeater'] ?? '';
$btnLink = $data['link'] ?? '';
$desc = $data['short_desc'] ?? '';
@endphp

<div class="l-inner-no-pr-tablet">
  <div class="c-tabs-calendar-blocks-template">
    @if ($yearsRepeater)
      @foreach ($yearsRepeater as $year)
        <div class="c-calendar__wrapper">
          <p class="c-calendar__year-title">{{ $year['year_title'] ?? '' }}</p>

          @if ($year['months_repeater'])
            @foreach ($year['months_repeater'] as $month)
              <div class="c-calendar__row">
                <p class="c-calendar__month-title">{{ $month['month_name'] ?? '' }}</p>
                <div class="c-calendar__days-wrapper">
                  @if ($month['days_repeater'])
                    @foreach ($month['days_repeater'] as $day)
                      @php
                        $singleDay = explode(' ', $day['day']);
                      @endphp
                      <div class="c-calendar__day">
                        <div class="c-calendar__day-number">{{ $singleDay[0] ?? '' }}</div>
                        <div class="c-calendar__day-name">{{ $singleDay[1] ?? '' }}</div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            @endforeach
          @endif
        </div>
      @endforeach
    @endif
    <p class="c-calendar__short-info">{!! $desc !!}</p>
  </div>
  @include('icon::calendar-blob', ['class' => 'c-calendar__blob'])

  <img class="c-calendar__bg" src="@asset('/images/calendar-bg.png')" alt="tło">
</div>
@if ($btnLink)
  @include('atoms.button-alt', [
      'text' => $btnLink['title'],
      'href' => $btnLink['url'],
      'target' => $btnLink['target'],
      'icon' => false,
      'class' => 'c-tabs-calendar-template__btn js-tab-btn',
  ])
@endif
