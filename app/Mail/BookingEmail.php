<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $visitor_email;
    public $tel;
    public $start;
    public $end;
    public $szType;
    public $lszam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $visitor_email, $tel, $start, $end, $szType, $lszam)
    {
        $this->name = $name;
        $this->visitor_email = $visitor_email;
        $this->tel = $tel;
        $this->start = $start;
        $this->end = $end;
        $this->szType = $szType;
        $this->lszam = $lszam;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.booking')
                    ->subject('Foglalás')
                    ->from('info@danfok.hu')
                    ->replyTo($this->visitor_email);
    }
}
