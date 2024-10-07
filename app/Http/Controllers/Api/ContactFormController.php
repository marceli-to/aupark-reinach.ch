<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InquiryUserEmail;
use App\Notifications\InquiryOwnerEmail;
use App\Models\Inquiry;

class ContactFormController extends Controller
{
  public function contact(ContactFormRequest $request)
  {
    $inquiry = Inquiry::create(
      // add without interest
      $request->only([
        'name', 
        'firstname',
        'email', 
        'street',
        'location',
        'phone',
        'message'
      ])
    );

    $interest_service = [];
    $interest = [];
    foreach($request->interest as $value)
    {
      if(strpos($value, '-Service') !== false)
      {
        $interest_service[] = str_replace('-Service', '', $value);
      } 
      else
      {
        $interest[] = $value;
      }
    }

    // if interest is not empty, then add it to the inquiry otherwise add null
    $inquiry->interest = $interest ? implode(', ', $interest) : null;
    $inquiry->interest_service = $interest_service ? implode(', ', $interest_service) : null;
    $inquiry->save();

    Notification::route('mail', $inquiry->email)->notify(new InquiryUserEmail($inquiry));

    if ($inquiry->interest_service)
    {
      Notification::route('mail', env('MAIL_TO_SERVICE'))->notify(new InquiryOwnerEmail($inquiry));
    }

    if ($inquiry->interest)
    {
      Notification::route('mail', env('MAIL_TO'))->notify(new InquiryOwnerEmail($inquiry));
    }

    return response()->json(['message' => 'Store successful']);
  }
}