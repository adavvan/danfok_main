<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'cf-turnstile-response' => ['required', Rule::turnstile()],
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $name = $request->input('name');
        $visitor_email = $request->input('email');
        $message = $request->input('message');

        try {
            // Send the email using the ContactEmail Mailable
            Mail::to('kapcsolat@danfok.hu')->send(new ContactEmail( $name, $visitor_email, $message));

            // Redirect with success message
            return redirect()->route('guest.kapcsolat')->with('success', 'Sikeres üzenetküldés!');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->route('guest.kapcsolat')->with('error', "Sikertelen üzenetküldés. Kérem vegye fel a kapcsolatot telefonon munkatársainkkal!");
        }
    }
}
