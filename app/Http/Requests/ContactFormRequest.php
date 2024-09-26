<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'interest' => 'required|array',
      'interest.*' => 'required|string|max:255',
      'name' => 'required|string|max:255',
      'firstname' => 'required|string|max:255',
      'street' => 'required|string|max:255',
      'location' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'phone' => 'required|string|max:255',
      'message' => 'required',
      'toc' => 'accepted',
    ];
  }

  public function messages()
  {
    return [
      'interest.required' => 'Auswahl ist erforderlich',
      'interest.*.required' => 'Auswahl ist erforderlich',
      'name.required' => 'Name ist erforderlich',
      'firstname.required' => 'Vorname ist erforderlich',
      'street.required' => 'Strasse/Nr. ist erforderlich',
      'location.required' => 'PLZ/Ort ist erforderlich',
      'email.required' => 'E-Mail-Adresse ist erforderlich',
      'email.email' => 'E-Mail-Adresse ist ungültig',
      'email.max' => 'E-Mail-Adresse ist zu lang',
      'phone.required' => 'Telefonnummer ist erforderlich',
      'phone.max' => 'Telefonnummer ist zu lang',
      'message.required' => 'Nachricht ist erforderlich',
      'toc.accepted' => 'Sie müssen den Datenschutzbestimmungen zustimmen',
    ];
  }
}