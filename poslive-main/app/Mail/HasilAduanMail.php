<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HasilAduanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $aduan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->aduan = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->aduan['email'], 'Kopi Mustika Bali')
                    ->subject('Kontak')
                    ->markdown('emails.contact.new');
    }
}
