@php
$blocks = $data['blocks'] ?? [];
@endphp

<div class="l-inner-no-pr-tablet">
  <div class="c-tabs-contact-blocks-template">
    @if ($blocks)
      <ul class="c-tabs-contact-blocks-template__blocks">

        @foreach ($blocks as $block)
          @php
            $heading = $block['heading'] ?? '';
            $sign = $block['sign'] ?? '';
            $phone = $block['phone'] ?? '';
            $email = $block['e-mail'] ?? '';
            $addCustomField = $block['add_custom_fields'] ?? '';
            $customFields = $block['custom_field'] ?? [];
          @endphp

          <li class="c-tabs-contact-blocks-template__block">
            {{-- Title --}}
            <div class="c-tabs-contact-blocks-template__block-heading-wrapper">
              <span class="c-tabs-contact-blocks-template__block-heading">{!! $heading !!}</span>
              <span class="c-tabs-contact-blocks-template__block-sign">{!! $sign !!}</span>
            </div>

            {{-- Phone --}}
            @if ($phone)
              <div class="c-tabs-contact-blocks-template__block-address-wrapper">
                <span class="c-tabs-contact-blocks-template__block-label">Telefon</span>
                <a href="tel:{{ $phone }}"
                  class="c-tabs-contact-blocks-template__block-phone c-tabs-contact-blocks-template__block-link">{!! $phone !!}</a>
              </div>
            @endif

            {{-- Email --}}
            @if ($email)
              <div class="c-tabs-contact-blocks-template__block-address-wrapper">
                <span class="c-tabs-contact-blocks-template__block-label">E-mail</span>
                <a href="mailto:{{ $email }}"
                  class="c-tabs-contact-blocks-template__block-mail c-tabs-contact-blocks-template__block-link">{!! $email !!}</a>
              </div>
            @endif

            {{-- Custom fields --}}
            @if ($addCustomField && $customFields)
              @foreach ($customFields as $field)
                @php
                  $title = $field['title'] ?? '';
                  $desc = $field['desc'] ?? '';
                @endphp

                <div class="c-tabs-contact-blocks-template__block-address-wrapper">
                  <span class="c-tabs-contact-blocks-template__block-label">{!! $title !!}</span>
                  <p class="c-tabs-contact-blocks-template__block-desc">{!! $desc !!}</p>
                </div>
              @endforeach
            @endif
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>
