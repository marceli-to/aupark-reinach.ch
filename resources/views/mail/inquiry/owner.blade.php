<x-mail::message>
  <div class="text-base pb-base">
    Neuer Interessent aupark-reinach.ch
  </div>
  <div class="text-base pb-base">
    <strong>Vorname</strong><br>
    {{ $data->firstname }}
  </div>
  <div class="text-base pb-base">
    <strong>Name</strong><br>
    {{ $data->name }}
  </div>
  <div class="text-base pb-base">
    <strong>Strasse/Nr.</strong><br>
    {{ $data->street }}
  </div>
  <div class="text-base pb-base">
    <strong>PLZ/Ort</strong><br>
    {{ $data->location }}
  </div>
  <div class="text-base pb-base">
    <strong>E-Mail</strong><br>
    {{ $data->email }}
  </div>
  <div class="text-base pb-base">
    <strong>Telefon</strong><br>
    {{ $data->phone }}
  </div>
  @if ($data->interest)
  <div class="text-base pb-base">
    <strong>Wohnung</strong><br>
    {{ $data->interest }}
  </div>
  @endif
  @if ($data->interest_service)
  <div class="text-base pb-base">
    <strong>Wohnung mit Service</strong><br>
    {{ $data->interest_service }}
  </div>
  @endif
  @if ($data->message)
  <div class="text-base pb-base">
    <strong>Nachricht</strong><br>
    {{ $data->message }}
  </div>
  @endif
</x-mail::message>
