<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactEmail extends Mailable
{
    public $name;
    public $visitor_email;
    public $contact_message; // Rename the variable to avoid conflicts

    /**
     * Create a new message instance.
     *
     * @param  string  $name
     * @param  string  $visitor_email
     * @param  string  $message
     * @return void
     */
    public function __construct($name, $visitor_email, $message)
    {
        $this->name = $name;
        $this->visitor_email = $visitor_email;
        $this->contact_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
            ->subject('Kapcsolat')
            ->from('info@danfok.hu');
    }
}