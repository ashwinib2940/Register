<?php

namespace App\Listeners;

use App\Events\RegisterMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeConfirmationEmail
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
     * @param  RegisterMail  $event
     * @return void
     */
    public function handle(RegisterMail $event)
    {
        \Mail::to($event->team->email)->send(
            new WelcomeMail($event->team, $event->user)
        );
    }
}
