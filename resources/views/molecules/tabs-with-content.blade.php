@php
$class = $class ?? '';
$tabs = $data['tabs'] ?? [];
$smallTabs = $smallTabs ?? false;
$outerTabs = $outerTabs ?? [];

$query = $_GET['type'] ?? false;
@endphp


<div class="c-tabs-with-content{{ $class ? ' ' . $class : '' }}">
  {{-- <div class="l-inner-no-pr-tablet"> --}}
  <div class="c-tabs-with-content__all-tabs-wrapper">

    {{-- Outer tabs --}}
    @if ($outerTabs)
      <div class="c-tabs-section__tabs-wrapper">
        @foreach ($outerTabs as $outerTab)
          @php
            $link = get_the_permalink($outerTab) ?? '#';
            $title = $outerTab->post_title;
          @endphp

          <a class="c-tabs-section__tab c-tabs-section__tab--outer{{ $title === get_the_title() ? ' c-tabs-section__tab--outer-active' : '' }}"
            href="{{ $link }}">{{ $title }}</a>
        @endforeach
      </div>
    @endif

    {{-- Inner tabs --}}
    @if ($tabs)
      <div class="c-tabs-with-content__tabs-wrapper">
        @if (count($tabs) > 1)
          @foreach ($tabs as $tab)
            @php
              $tabTitle = $tab['title'] ?? false;
              $sanitizedTitle = sanitize_title($tabTitle);
              $isQueryEqual = $sanitizedTitle === $query;
              $isTabActive = $query ? $isQueryEqual : $loop->first;
            @endphp

            <button
              class="c-tabs-with-content__tab{{ $isTabActive ? ' c-tabs-with-content__tab--active' : '' }}{{ $smallTabs ? '' : ' c-tabs-section__tab--outer' }} js-category-tab"
              data-tab-id="{{ $loop->index }}" data-tab-query="{{ $sanitizedTitle }}">{!! $tabTitle !!}</button>
          @endforeach
        @endif
      </div>
    @endif
  </div>
  {{-- </div> --}}

  @if ($tabs)
    <div class="c-tabs-with-content__tab-content-wrapper js-tab-content-wrapper" style="--contentHeight: x">
      <div class="c-tabs-with-content__tab-content-inner">
        @foreach ($tabs as $tab)
          @php
            $template = $tab['template'] ?? '';
            $tabTitle = $tabs[$loop->index]['title'] ?? false;
            $sanitizedTitle = sanitize_title($tabTitle);
            $isQueryEqual = $sanitizedTitle === $query;
            $isTabActive = $query ? $isQueryEqual : $loop->first;
          @endphp

          <div
            class="c-tabs-with-content__tab-content{{ $isTabActive ? ' c-tabs-with-content__tab-content--active js-category-tab-content--active' : '' }} js-category-tab-content js-inside-scroll-outer"
            data-tab-content-id="{{ $loop->index }}">
            <div class="js-inside-scroll-inner">

              {{-- Choose template --}}
              @if ($template === 'menu')
                @include('molecules.tabs-menu-template', [
                    'data' => $tab['template_menu'] ?? '',
                ])
              @elseif($template === 'faq')
                @include('molecules.tabs-faq-template', [
                    'data' => $tab['template_faq'] ?? '',
                ])
              @elseif($template === 'contact_blocks')
                @include('molecules.tabs-contact-blocks-template', [
                    'data' => $tab['template_contact_blocks'] ?? '',
                ])
              @elseif($template === 'contact')
                @include('molecules.tabs-contact-template', [
                    'data' => $tab['template_contact'] ?? '',
                ])
              @elseif($template === 'calendar')
                @include('molecules.tabs-calendar-template', [
                    'data' => $tab['template_calendar'] ?? '',
                ])
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif
</div>
