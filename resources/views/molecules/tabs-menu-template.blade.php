@php
$desc = $data['desc'] ?? '';
$btnLink = $data['btn_link'] ?? '';
$menuTypes = $data['menu_types'] ?? '';
@endphp

<div class="l-inner-no-pr-tablet">
  <div class="c-tabs-menu-template">
    <p class="c-tabs-menu-template__desc">{!! $desc !!} </p>
    <div class="c-tabs-menu-template__wrapper">

      {{-- Menu types --}}
      @if ($menuTypes)
        @foreach ($menuTypes as $menuType)
          @php
            $menuDivisions = $menuType['menu_divisions'] ?? [];
            $menuTypeTitle = $menuType['title'] ?? '';
            $menuTypeNote = $menuType['note'] ?? '';
            $menuTypePrice = $menuType['menu_type_price'] ?? '';
          @endphp

          <div class="c-tabs-menu-template__menu-type">
            <div class="c-tabs-menu-template__menu-type-title-wrapper">
              <div
                class="c-tabs-menu-template__menu-type-title-wrapper c-tabs-menu-template__menu-type-title-wrapper--horizontal">
                <span class="c-tabs-menu-template__menu-type-title">{!! $menuTypeTitle !!}</span>
                @if ($menuTypePrice)
                  <span class="c-tabs-menu-template__menu-type-price">{!! $menuTypePrice !!}</span>
                @endif
              </div>
              @if ($menuTypeNote)
                <p class="c-tabs-menu-template__menu-type-note">{!! $menuTypeNote !!}</p>
              @endif
            </div>

            {{-- Menu divisions --}}
            @if ($menuDivisions)
              @foreach ($menuDivisions as $menuDivision)
                @php
                  $menuItems = $menuDivision['menu_items'] ?? [];
                  $menuCategory = $menuDivision['menu_category'] ?? '';
                  $menuCategoryPrice = $menuDivision['menu_category_price'] ?? '';
                  $menuCategoryAddNote = $menuDivision['menu_add_note'] ?? false;
                  $menuCategoryUseSmallFont = $menuDivision['menu_use_small_font'] ?? false;

                @endphp
                <div class="c-tabs-menu-template__menu-division">
                  <div class="c-tabs-menu-template__menu-division-title-wrapper">
                    <span class="c-tabs-menu-template__menu-division-title">{!! $menuCategory !!}</span>
                    <span class="c-tabs-menu-template__menu-division-price">{!! $menuCategoryPrice !!}</span>
                  </div>

                  {{-- Menu items --}}
                  @if ($menuItems)
                    @foreach ($menuItems as $menuItem)
                      @php
                        $itemPrices = $menuItem['price'] ?? [];
                        $itemName = $menuItem['name'] ?? '';
                        $itemDesc = $menuItem['desc'] ?? '';
                      @endphp

                      <div class="c-tabs-menu-template__menu-item">
                        <div class="c-tabs-menu-template__menu-item-title-desc-wrapper">
                          <span
                            class="c-tabs-menu-template__menu-item-title{{ $menuCategoryUseSmallFont ? ' c-tabs-menu-template__menu-item-title--small' : '' }}">{!! $itemName !!}</span>
                          <p class="c-tabs-menu-template__menu-item-desc">{!! $itemDesc !!}</p>
                        </div>

                        {{-- Menu prices --}}
                        @if ($itemPrices)
                          <div class="c-tabs-menu-template__menu-item-prices">
                            @foreach ($itemPrices as $itemPrice)
                              @php
                                $itemPriceVolume = $itemPrice['volume'] ?? '';
                                $itemPriceValue = $itemPrice['value'] ?? '';
                              @endphp

                              <div class="c-tabs-menu-template__menu-item-price">
                                <span class="c-tabs-menu-template__menu-item-price-value">{{ $itemPriceValue }}</span>
                                <span
                                  class="c-tabs-menu-template__menu-item-price-volume">{{ $itemPriceVolume }}</span>
                              </div>
                            @endforeach
                          </div>
                        @endif
                      </div>
                    @endforeach
                  @endif

                  {{-- Menu division note --}}
                  @if ($menuCategoryAddNote)
                    @php
                      $menuCategoryNote = $menuDivision['menu_note'] ?? '';
                      $menuCategoryNoteTitle = $menuCategoryNote['title'] ?? '';
                      $menuCategoryNoteDesc = $menuCategoryNote['desc'] ?? '';
                      $menuCategoryNoteList = $menuCategoryNote['list'] ?? [];
                    @endphp

                    <div class="c-tabs-menu-template__menu-division-note">
                      @if ($menuCategoryNoteTitle)
                        <span class="c-tabs-menu-template__menu-division-note-title">{!! $menuCategoryNoteTitle !!}</span>
                      @endif

                      @if ($menuCategoryNoteDesc)
                        <p class="c-tabs-menu-template__menu-division-note-desc">{!! $menuCategoryNoteDesc !!}</p>
                      @endif

                      @if ($menuCategoryNoteList)
                        <ul class="c-tabs-menu-template__menu-division-note-list">
                          @foreach ($menuCategoryNoteList as $listItem)
                            <li class="c-tabs-menu-template__menu-division-note-list-item">
                              {{ $listItem['text'] ?? '' }}
                            </li>
                          @endforeach
                        </ul>
                      @endif
                    </div>
                  @endif

                </div>
              @endforeach
            @endif
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>
{{-- </div> --}}
@if ($btnLink)
  @include('atoms.button-alt', [
      'text' => 'Pobierz całe menu',
      'href' => $btnLink ?? '',
      'target' => '_blank',
      'class' => 'c-tabs-menu-template__btn js-tab-btn',
  ])
@endif
