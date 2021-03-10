<?php

namespace App\Listeners;

use App\Events\SignalEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SignalEmailJob;

class SignalEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SignalEmail  $event
     * @return void
     */
    public function handle(SignalEmail $event)
    {
    
        SignalEmailJob::dispatch($event);


    }
}
