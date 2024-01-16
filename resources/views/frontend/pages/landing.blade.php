@extends('frontend.layout.app')
@section('content')
@if ($state)
<div class="alert js-alert">
  <div>Vielen Dank für Ihr Interesse. Wir werden Ihre Anfrage so schnell als möglich bearbeiten.</div>
</div>
@endif

<x-swiper>
  <x-swiper.slide :image="'aupark-reinach-visualisierung-1'" :alt="''" />
  <x-swiper.slide :image="'aupark-reinach-visualisierung-2'" :alt="''" />
  <x-swiper.slide :image="'aupark-reinach-visualisierung-3'" :alt="''" />
  <x-swiper.slide :image="'aupark-reinach-visualisierung-4'" :alt="''" />
</x-swiper>

<section class="page-section is-dark">
  <div class="page-inner">
    <article>
      <h1>Wohnen in Reinach, Baselland</h1>
      <h2>Erstvermietung</h2>
      <p>An der Aumattstrasse 70/72 wird per Frühsommer 2025 eine neue, lebendige und generationenübergreifende Wohnüberbauung realisiert. Es entstehen moderne 4.5- und 5.5-Zimmerwohnungen, ideal für Paare oder Familien sowie altersgerechte 2.5- und 3.5-Zimmerwohnungen, bei welchen auch Zusatzleistungen (z. B. Betreuung oder Service-Dienstleistungen) von dem benachbarten Seniorenzentrum Aumatt bezogen werden können.</p>
      <p>Interessiert? Gerne senden wir Ihnen weitere Informationen, sobald die Vermietung startet. Bitte füllen Sie dazu das Kontaktformular aus.</p>
    </article>
  </div>
</section>
<section class="page-section is-light">
  <div class="page-inner">
    <article>
      <h1>Kontaktformular</h1>
      <p>Ich interessiere mich für folgende Wohnung (bitte auswählen):</p>
      <form method="POST" action="{{ route('page_landing_subscribe') }}" class="contact-form js-validate">
        @csrf
        @if ($errors->has('interest'))
          <div class="error-message">{{ $errors->first('interest') }}</div>
        @else
          <div class="error-message" style="display:none">Bitte mind. 1 Option auswählen</div>
        @endif
        <div class="sm:grid sm:grid-cols-16 sm:grid-column-gap mb-5x">
          <div class="sm:col-span-8 md:col-span-7 sm:order-1 mb-2x md:mb-2x">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="2.5 Zi" id="interest-2.5">
              <label for="interest-2.5">2.5-Zimmerwohnung (Seniorenwohnung)</label>
            </div>
          </div>
          <div class="sm:col-span-8 md:col-span-7 sm:order-3 mb-2x md:mb-2x">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="3.5 Zi" id="interest-3.5">
              <label for="interest-3.5">3.5-Zimmerwohnung (Seniorenwohnung)</label>
            </div>
          </div>
          <div class="sm:col-span-8 md:col-span-7 sm:order-2 mb-2x md:mb-2x">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="4.5 Zi" id="interest-4.5">
              <label for="interest-4.5">4.5-Zimmerwohnung</label>
            </div>
          </div>
          <div class="sm:col-span-8 md:col-span-7 sm:order-4 mb-2x md:mb-3x">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="5.5 Zi" id="interest-5.5">
              <label for="interest-5.5">5.5-Zimmerwohnung</label>
            </div>
          </div>
        </div>
        <div class="sm:grid sm:grid-cols-16 sm:grid-gap">
          <div class="relative sm:col-span-8 md:col-span-7 mb-4x sm:mb-0">
            @if ($errors->has('firstname'))
              <div class="error-message is-floating">{{ $errors->first('firstname') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">Vorname muss ausgefüllt sein!</div>
            @endif
            <input type="text" name="firstname" placeholder="Vorname *" data-rules="required">
          </div>
          <div class="relative sm:col-span-8 md:col-span-7 mb-4x sm:mb-0">
            @if ($errors->has('name'))
              <div class="error-message is-floating">{{ $errors->first('name') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">Name muss ausgefüllt sein!</div>
            @endif
            <input type="text" name="name" placeholder="Name *" data-rules="required">
          </div>
          <div class="relative sm:col-span-8 md:col-span-7 mb-4x sm:mb-0">
            @if ($errors->has('email'))
              <div class="error-message is-floating">{{ $errors->first('email') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">E-Mail-Adresse muss gültig sein!</div>
            @endif
            <input type="text" name="email" placeholder="E-Mail *" data-rules="required|valid_email">
          </div>
          <div class="relative sm:col-span-8 md:col-span-7 mb-4x sm:mb-0">
            @if ($errors->has('phone'))
              <div class="error-message is-floating">{{ $errors->first('phone') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">Telefon muss gültig sein!</div>
            @endif
            <input type="text" name="phone" placeholder="Telefon *" data-rules="required">
          </div>

          <div class="relative sm:col-span-8 md:col-span-12 mb-4x sm:mb-0">
            @if ($errors->has('privacy'))
              <div class="error-message mb-2x">{{ $errors->first('privacy') }}</div>
            @else
              <div class="error-message mb-2x js-error-privacy" style="display:none">Bitte Datenschutzerklärung akzeptieren</div>
            @endif
            <div class="form-control">
              <input type="checkbox" name="privacy" value="1" id="privacy" data-rules="required|check[privacy]">
              <label for="privacy">
                <span class="text">Ich habe die <a href="{{ route('page_privacy') }}" target="_blank">Datenschutzerklärung</a> gelesen und akzeptiere diese.</span>
              </label>
            </div>
          </div>
          <div class="sm:col-span-8">
            <div class="form-button">
              <input type="submit" value="Absenden" class="js-btn-submit">
            </div>
          </div>
        </div>
      </form>
    </article>
  </div>
</section>
@endsection