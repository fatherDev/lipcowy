@if ($text ?? '')
  <div class="{{ $class ?? '' }}">
    <svg viewBox="0 0 200 200" width="200" height="200">
      <defs>
        <path id="{{ $id ?? '' }}" d="
          M170,100
          a70,70,0,1,1-70-70
          A70,70,0,0,1,170,100Z" />
      </defs>
      <text font-size="14">
        <textPath xlink:href="#{{ $id ?? '' }}">
          {{ $text }}
        </textPath>
      </text>
    </svg>
  </div>
@endif
