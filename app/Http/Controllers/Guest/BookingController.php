<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\BookingEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function sendEmail(Request $request)
    {
        $messages = [
            'name.required' => 'A név megadása kötelező.',
            'email.required' => 'Az e-mail cím megadása kötelező.',
            'email.email' => 'Az e-mail cím érvénytelen.',
            'tel.required' => 'A telefonszám megadása kötelező.',
            'start.required' => 'A kezdő időpont megadása kötelező.',
            'start.after_or_equal' => 'A kezdő időpont nem lehet a mai napnál korábbi dátum.',
            'end.required' => 'A befejező időpont megadása kötelező.',
            'end.after_or_equal' => 'A befejező időpontnak a kezdő időpont utáni dátumnak kell lennie.',
            'szType.required' => 'A szállás típusának megadása kötelező.',
            'lszam.required' => 'A létszám megadása kötelező!'
        ];

        // Validálás a definiált szabályokkal és hibaüzenetekkel
        $request->validate([
            'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'start' => 'required|date|after_or_equal:today',
            'end' => 'required|date|after_or_equal:start',
            'szType' => 'required',
            'lszam' => 'required'
        ], $messages);

        $name = $request->input('name');
        $visitor_email = $request->input('email');
        $tel = $request->input('tel');
        $start = $request->input('start');
        $end = $request->input('end');
        $szType = $request->input('szType');
        $lszam = $request->input('lszam');

        try {
            // Send the email using the FoglalasEmail Mailable
            Mail::to('info@danfok.hu')->send(new BookingEmail($name, $visitor_email, $tel, $start, $end, $szType, $lszam));

            // Redirect with success message
            return redirect()->route('guest.szallas')->with('success', 'A szállásigény küldése sikeres volt, kollégáink hamarosan felveszik önnel a kapcsolatot!');
        } catch (\Exception $e) {
            // Redirect with error message
            error_log($e->__toString());
            return redirect()->route('guest.szallas')->with('error', "A szállásigény küldése sikertelen volt, kérem vegye fel a kapcsolatot telefonon munkatársainkkal!");
        }
    }
}
