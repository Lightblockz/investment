<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The mail object instance.
     *
     * @var Mail
     */
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("hello@lightblocks.biz",'Lightblocks')
        ->subject('Trade Signal Subscription Pending Approval')
        ->view('mails.subscription')
        ->with([
          'details' => $this->details,
        ]);

    }
}
