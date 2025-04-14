<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Notification;
use App\Models\RegistrationEvent;

class RegistrationController extends Controller
{
    public function index()
    {
        $event = Event::where('slug', request('slug'))->firstOrFail();
        $step = request('step', 1);
        return view('frontend.pages.registration.step1', compact('event', 'step'));
    }

    public function submit()
    {
        request()->validate([
            'event_id' => ['required', 'numeric'],
            'pax_total' => ['required', 'numeric'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required'],
            'telephone' => ['required'],
            'certificate_name' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'email_confirmation' => ['required'],
            'phone_number' => ['required'],
            'performance_type' => ['required'],
            'performance_name' => ['required'],
            'performance_minute' => ['required'],
            'music_type' => ['required'],
            'performance_number' => ['required'],
        ]);

        try {
            $data = request()->all();
            $data['user_id'] = auth()->user()->id ?? null;

            $event = Event::findOrFail($data['event_id']);
            $data['price'] = $event->fee;
            $data['total'] = $event->fee * request('pax_total');
            $RegistrationEvent = RegistrationEvent::create($data);
            // $data_notification = [
            //     'title' => $event->name . ' Payment Infomation',
            //     'description' => 'Your registration has been aproved. You can now continue to payment.',
            //     'user_id' => auth()->user()->id,
            //     'link' => route('frontend.registration.payment', $RegistrationEvent->id),
            //     'type' => 'payment'
            // ];
            // Notification::create($data_notification);
            return redirect()->route('frontend.registration.success')->with('success', 'Event Registered Successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function success()
    {
        return view('frontend.pages.registration.success')->with('success', 'Event Registered Successfully');
    }

    public function payment($id)
    {
        $registration = RegistrationEvent::with(['event'])->where('user_id', auth()->id())->where('id', $id)->firstOrFail();
        return view('frontend.pages.registration.payment', [
            'title' => 'Payment Confirmation',
            'registration' => $registration
        ]);
    }

    public function payment_submit($id)
    {
        request()->validate([
            'file' => ['required', 'image']
        ]);

        $registration = RegistrationEvent::with(['event'])->where('user_id', auth()->id())->where('id', $id)->firstOrFail();

        $registration->update([
            'proof_of_payment' => request()->file('file')->store('registration', 'public')
        ]);


        return view('frontend.pages.registration.payment-success')->with('success', 'Event Registered Successfully');
    }
}
