<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TradeSignalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The mail object instance.
     *
     * @var Mail
     */
    public $signal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($signal)
    {
        $this->signal = $signal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("hello@lightblocks.biz",'Lightblocks Trade Signal')
        ->subject('Take your position traders!')
        ->view('mails.signal')
        ->with([
          'details' => $this->signal,
        ]);

    }
}
