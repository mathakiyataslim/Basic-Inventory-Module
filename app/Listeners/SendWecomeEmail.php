<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\SendEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWecomeEmail 
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        SendEmail::dispatch($event->user)->delay(now()->addSeconds(2));
        // SendEmail::dispatch($event->user);
    //   Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}
