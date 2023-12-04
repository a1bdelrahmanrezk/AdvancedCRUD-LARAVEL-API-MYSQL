<?php

namespace Modules\Mail\app\Events;

use Illuminate\Queue\SerializesModels;

class CreateUserEvent
{
    use SerializesModels;
    public $user;
    public $email;
    /**
     * Create a new event instance.
     */
    public function __construct($user,$email)
    {
        $this->user = $user;
        $this->email = $email;
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
