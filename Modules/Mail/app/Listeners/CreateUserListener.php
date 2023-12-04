<?php

namespace Modules\Mail\app\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Mail\app\Events\CreateUserEvent;
use Modules\Mail\app\Emails\CreateNewUserMail;

class CreateUserListener
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
    public function handle(CreateUserEvent $event): void
    {
            Mail::to($event->email)->send(new CreateNewUserMail($event->user));
    }
}
