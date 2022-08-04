@php
$btns = get_field('floating_btns', 'option') ?? '';
$menuBtn = $fields['menu_btn'] ?? '';
if ($menuBtn) {
    $menuBtnLink = $menuBtn['menu_link'] ?? '#';
}
$voucherBtnLink = $btns['voucher_btn_link'] ?? '#';
$storeBtnLink = $btns['store_btn_link'] ?? '#';
@endphp

{{-- Overlay --}}
<div class="c-floating-buttons__overlay js-floating-buttons-overlay ui-invisible"></div>


{{-- Buttons --}}
@if ($menuBtn)
  <div class="c-floating-buttons">
    @include('atoms.floating-button', [
        'text' => 'Menu',
        'href' => $menuBtnLink,
        'light' => true,
        'icon' => 'menu-icon',
    ])
    @include('atoms.floating-button', [
        'text' => 'Kup voucher',
        'href' => $voucherBtnLink,
        'rel' => 'nofollow',
        'openInNewWindow' => true,
        'icon' => 'voucher-icon',
    ])
    @include('atoms.floating-button', [
        'text' => 'Sklep',
        'href' => $storeBtnLink,
        'target' => 'nofollow',
        'openInNewWindow' => true,
        'icon' => 'store-icon',
    ])
  </div>
@endif
