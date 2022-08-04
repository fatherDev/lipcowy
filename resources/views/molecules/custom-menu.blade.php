@php
global $wp_query;
$menu_id = App\get_menu_id('mobile_menu');
$header_menu = wp_get_nav_menu_items($menu_id);
$current_id = $wp_query->queried_object_id;
@endphp




@if (!empty($header_menu) && is_array($header_menu))
  <nav class="main-nav">
    <ul class="c-nav__list--mobile js-accordion">
      @foreach ($header_menu as $menu_item)
        @if (!$menu_item->menu_item_parent)
          @php
            $child_menu_items = App\get_child_menu_items($header_menu, $menu_item->ID);
          @endphp

          @if (!$child_menu_items)
            <li class="menu-item {{ $current_id == $menu_item->object_id ? 'menu-active' : '' }}">
              <a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a>
            </li>
          @else
            <li class="menu-item menu-item-has-children">
              <div class="menu-item-link__wrapper">
                <a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a>
                @include('icon::chevron')
              </div>
              <div class="accordion__body">
                <ul class="sub-menu">
                  @foreach ($child_menu_items as $menu_item)
                    <li class="sub-menu__menu-item {{ $current_id == $menu_item->object_id ? 'menu-active' : '' }}">
                      <a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </li>
          @endif
        @endif
      @endforeach
    </ul>
  </nav>
@endif
