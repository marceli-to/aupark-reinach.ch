@extends('frontend.layout.app')
@section('content')
@if ($state)
<div class="alert js-alert">
  <div>Vielen Dank für Ihr Interesse. Wir werden Ihre Anfrage so schnell als möglich bearbeiten.</div>
</div>
@endif

<x-swiper>
  <x-swiper.slide :image="'visual-aupark-reinach-1.jpg'" :alt="''" />
  <x-swiper.slide :image="'visual-aupark-reinach-2.jpg'" :alt="''" />
  <x-swiper.slide :image="'visual-aupark-reinach-3.jpg'" :alt="''" />
  <x-swiper.slide :image="'visual-aupark-reinach-4.jpg'" :alt="''" />
</x-swiper>

<section class="page-section is-dark">
  <div class="page-inner">
    <article>
      <h1>Wohnen in Reinach, Baselland</h1>
      <h2>Erstvermietung</h2>
      <p>An der Aumattstrasse 70/72 wird per Ende 2024 / per Anfang 2025 eine neue, lebendige und generationenübergreifende Wohnüberbauung realisiert. Es entstehen moderne 4.5- und 5.5-Zimmerwohnungen, ideal für Paare oder Familien sowie altersgerechte 2.5- und 3.5-Zimmerwohnungen, bei welchen auch Zusatzleistungen (z. B. Betreuung oder Service-Dienstleistungen) von dem benachbarten Seniorenzentrum Aumatt bezogen werden können.</p>
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
        <div class="form-controls__grid">
          <div class="span sm:order-1">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="2.5 Zi" id="interest-2.5">
              <label for="interest-2.5">2.5-Zimmerwohnung (Seniorenwohnung)</label>
            </div>
          </div>
          <div class="span sm:order-3">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="3.5 Zi" id="interest-3.5">
              <label for="interest-3.5">3.5-Zimmerwohnung (Seniorenwohnung)</label>
            </div>
          </div>
          <div class="span sm:order-2">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="4.5 Zi" id="interest-4.5">
              <label for="interest-4.5">4.5-Zimmerwohnung</label>
            </div>
          </div>
          <div class="span sm:order-4">
            <div class="form-control">
              <input type="checkbox" name="interest[]" value="5.5 Zi" id="interest-5.5">
              <label for="interest-5.5">5.5-Zimmerwohnung</label>
            </div>
          </div>
        </div>
        <div class="sm:grid sm:grid-cols-16 sm:grid-gap">
          <div class="relative sm:col-span-8">
            @if ($errors->has('firstname'))
              <div class="error-message is-floating">{{ $errors->first('firstname') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">Vorname muss ausgefüllt sein!</div>
            @endif
            <input type="text" name="firstname" placeholder="Vorname *" data-rules="required">
          </div>
          <div class="relative sm:col-span-8">
            @if ($errors->has('name'))
              <div class="error-message is-floating">{{ $errors->first('name') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">Name muss ausgefüllt sein!</div>
            @endif
            <input type="text" name="name" placeholder="Name *" data-rules="required">
          </div>
          <div class="relative sm:col-span-8">
            @if ($errors->has('email'))
              <div class="error-message is-floating">{{ $errors->first('email') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">E-Mail-Adresse muss gültig sein!</div>
            @endif
            <input type="text" name="email" placeholder="E-Mail *" data-rules="required|valid_email">
          </div>
          <div class="relative sm:col-span-8">
            @if ($errors->has('phone'))
              <div class="error-message is-floating">{{ $errors->first('phone') }}</div>
            @else 
              <div class="error-message is-floating" style="display:none">Telefon muss gültig sein!</div>
            @endif
            <input type="text" name="phone" placeholder="Telefon *" data-rules="required">
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