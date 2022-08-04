@php
$contactForm = get_field('contact_form', 'option') ?? '';

$subtitle = $contactForm['subtitle'] ?? '';
$title = $contactForm['title'] ?? '';
@endphp

<section class="c-contact-modal js-contact-modal">
  <div class="c-contact-modal__wrapper">
    <button class="c-contact-modal__btn js-close-modal">
      @include('icon::close-icon')
    </button>

    <div class="l-inner">
      <span class="t-typo-p1">{{ $subtitle }}</span>
      <h2 class="c-contact-modal__title">{!! $title !!}</h2>

      <div class="c-contact-form">
        {!! do_shortcode('[contact-form-7 id="334" title="Formularz 1"]') !!}
      </div>
    </div>
  </div>

</section>
