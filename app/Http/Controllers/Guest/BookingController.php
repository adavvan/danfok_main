<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\BookingEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the form data
  /*      $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'start' => 'required',
            'end' => 'required',
            'szType' => 'required',
        ]);
        \Log::info("XDDD"); */

        $name = $request->input('name');
        $visitor_email = $request->input('email');
        $tel = $request->input('tel');
        $start = $request->input('start');
        $end = $request->input('end');
        $szType = $request->input('szType');

        try {
            // Send the email using the FoglalasEmail Mailable
            Mail::to('info@danfok.hu')->send(new BookingEmail($name, $visitor_email, $tel, $start, $end, $szType));

            // Redirect with success message
            return redirect()->route('guest.szallas')->with('success', 'A szállásigény küldése sikeres volt, kollégáink hamarosan felveszik önnel a kapcsolatot!');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->route('guest.szallas')->with('error', "A szállásigény küldése sikertelen volt, kérem vegye fel a kapcsolatot telefonon munkatársainkkal!");
        }
    }
}
