@php
$list = $data['content'] ?? [];
$btnLink = $data['btn_link'] ?? '';
@endphp

<div class="l-inner-no-pr-tablet">
  <div class="c-tabs-faq-template">
    @if ($list)
      <ul class="c-tabs-faq-template__list">

        @foreach ($list as $item)
          @php
            $question = $item['question'] ?? '';
            $answer = $item['answer'] ?? '';
          @endphp

          <li class="c-tabs-faq-template__list-item">
            <p class="c-tabs-faq-template__question">{{ $loop->index + 1 }}. {!! $question !!}</p>
            <p class="c-tabs-faq-template__answer">{!! $answer !!}</p>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>


@if ($btnLink)
  @include('atoms.button-alt', [
      'text' => $btnLink['title'] ?? 'Pobierz PDF',
      'href' => $btnLink['url'] ?? '',
      'class' => 'c-tabs-faq-template__btn',
  ])
@endif
