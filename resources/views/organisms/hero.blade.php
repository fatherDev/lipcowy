@php
$accent = $accent ?? '';
$class = $class ?? '';
$media = $data['media'] ?? '';
$showSocialMedia = $showSocialMedia ?? true;
@endphp

@include('organisms.media-gallery-section', [
    'data' => $media,
    'class' => 'c-hero__media-gallery ' . $class,
    'showSocialMedia' => $showSocialMedia,
    'accent' => $accent,
])
