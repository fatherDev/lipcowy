@php
$title = $data['title'] ?? '';
$contact = get_field('contact_info', 'option') ?? [];
$socials = get_field('socials', 'option') ?? [];
$useCustomFields = $data['use_custom_fields'] ?? false;
$addSocialMedia = $data['add_socials'] ?? false;

@endphp

<div class="c-tabs-contact-template">

  <span class="c-tabs-contact-template__title">{!! $title !!}</span>
  <div class="c-tabs-contact-template__wrapper">

    @if (!$useCustomFields)
      @php
        $defaultAddress = $contact['address'] ?? '';
        $defaultPhone = $contact['phone'] ?? '';
        $defaultMail = $contact['mail'] ?? '';

        $address = $data['address'] ?? [];
        $useDefaultAddress = $address['use_default_address'] ?? true;
        $customAddress = $address['address_value'] ?? true;

        $phone = $data['phone'] ?? [];
        $useDefaultPhone = $phone['use_default_phone'] ?? true;
        $customPhone = $phone['phone_value'] ?? true;

        $email = $data['email'] ?? [];
        $useDefaultEmail = $email['use_default_email'] ?? true;
        $customEmail = $email['email_value'] ?? true;

        $fax = $data['fax'] ?? '';
        $worktime = $data['worktime'] ?? '';
      @endphp

      {{-- Address --}}
      @if ($address)
        <div class="c-tabs-contact-template__block-wrapper">
          <span class="c-tabs-contact-template__label">Adres</span>
          @if ($useDefaultAddress)
            <span class="c-tabs-contact-template__text">{!! $defaultAddress !!}</span>
          @else
            <span class="c-tabs-contact-template__text">{!! $customAddress !!}</span>
          @endif
        </div>
      @endif

      {{-- Phone --}}
      @if ($phone)
        <div class="c-tabs-contact-template__block-wrapper">
          <span class="c-tabs-contact-template__label">Telefon</span>
          @if ($useDefaultPhone)
            <a href="tel:{{ $defaultPhone }}" class="c-tabs-contact-template__text">{!! $defaultPhone !!}</a>
          @else
            <a href="tel:{{ $customPhone }}" class="c-tabs-contact-template__text">{!! $customPhone !!}</a>
          @endif
        </div>
      @endif

      {{-- Fax --}}
      @if ($fax)
        <div class="c-tabs-contact-template__block-wrapper">
          <span class="c-tabs-contact-template__label">Fax</span>
          <a href="tel:{{ $fax }}" class="c-tabs-contact-template__text">{!! $fax !!}</a>
        </div>
      @endif

      {{-- E-mail --}}
      @if ($email)
        <div class="c-tabs-contact-template__block-wrapper">
          <span class="c-tabs-contact-template__label">E-mail</span>
          @if ($useDefaultEmail)
            <a href="mailto:{{ $defaultMail }}" class="c-tabs-contact-template__text">{!! $defaultMail !!}</a>
          @else
            <a href="mailto:{{ $customEmail }}" class="c-tabs-contact-template__text">{!! $customEmail !!}</a>
          @endif
        </div>
      @endif

      {{-- Worktime --}}
      @if ($worktime)
        <div class="c-tabs-contact-template__block-wrapper">
          <span class="c-tabs-contact-template__label">Godziny pracy</span>
          <p class="c-tabs-contact-template__text">{!! $worktime !!}</p>
        </div>
      @endif

      {{-- Custom fields --}}
    @else
      @php
        $customFields = $data['custom_fields'] ?? [];
      @endphp

      @if ($customFields)
        @foreach ($customFields as $field)
          @php
            $fieldTitle = $field['title'] ?? '';
            $fieldDesc = $field['desc'] ?? '';
            $fieldVariant = $field['variant'] ?? '';
          @endphp

          <div class="c-tabs-contact-template__block-wrapper">
            <span class="c-tabs-contact-template__label">{!! $fieldTitle !!}</span>

            {{-- Handle custom field variant --}}
            @if ($fieldVariant === 'standard')
              <p class="c-tabs-contact-template__text">{!! $fieldDesc !!}</p>
            @elseif ($fieldVariant === 'link')
              <a href="{{ $field['link_address'] ?? '' }}"
                class="c-tabs-contact-template__text">{!! $fieldDesc !!}</a>
            @elseif ($fieldVariant === 'mail')
              <a href="mailto:{{ $fieldDesc }}" class="c-tabs-contact-template__text">{!! $fieldDesc !!}</a>
            @elseif ($fieldVariant === 'phone')
              <a href="tel:{{ $fieldDesc }}" class="c-tabs-contact-template__text">{!! $fieldDesc !!}</a>
            @endif
          </div>
        @endforeach
      @endif
    @endif

    {{-- Social media --}}
    @if ($addSocialMedia)
      <div class="c-tabs-contact-template__social-media">
        @include('atoms.socials-list')
      </div>
    @endif
  </div>
</div>
