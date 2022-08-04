@php
$class = $class ?? '';
$data = $data ?? '';
@endphp

@include('organisms.tabs-section', ['data' => $data, 'outerTabs' => $menus->posts])
