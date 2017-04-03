<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Appointment;
use App\Client;

class newAppointment extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $appointment;
    public $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client, Appointment $appointment)
    {
        $this->client = $client;
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newAppointment');
    }
}
