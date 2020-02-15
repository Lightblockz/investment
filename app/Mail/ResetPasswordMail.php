<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The mail object instance.
     *
     * @var Mail
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("hello@lightblocks.biz",'Lightblocks')
        ->subject('Reset your LightBlocks passsword')
        ->view('mails.password_reset')
        ->with([
          'user' => $this->user,
          'token' => $this->user->reset_token,
          'url' => url("/user/password/reset/{$this->user->email}/{$this->user->reset_token}"),
        ]);

    }
}
