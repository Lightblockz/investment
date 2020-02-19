<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BankTransferMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The mail object instance.
     *
     * @var Mail
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("hello@lightblocks.biz",'Lightblocks')
        ->subject('Investment awaiting approval')
        ->view('mails.bank_transfer')
        ->with([
          'order' => $this->order,
        ]);

    }
}
