@php
$href = $href ?? '';
$HTMLelement = $href ? 'a' : 'button';
@endphp

@if (!empty($data))
  <{{ $HTMLelement }} class="c-circle-button{{ $href ? '' : ' js-open-contact-modal' }}"
    {{ $href ? 'href=' . $href : '' }}>
    <svg class="c-circle-button__svg" viewBox="0 0 200 200" width="200" height="200">
      <defs>
        <path id="circle" d="
            M170,100
            a70,70,0,1,1-70-70
            A70,70,0,0,1,170,100Z" />
      </defs>
      <text font-size="14">
        <textPath xlink:href="#circle">
          {{ $data['title'] ?? '' }}
        </textPath>
      </text>
    </svg>
    <div class="c-circle-button__arrows">
      @include('icon::long-arrow')
      @include('icon::long-arrow')
    </div>
    </{{ $HTMLelement }}>
@endif
