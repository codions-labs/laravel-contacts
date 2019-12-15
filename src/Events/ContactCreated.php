<?php

declare(strict_types=1);

namespace Rinvex\Contacts\Events;

use Rinvex\Contacts\Models\Contact;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ContactCreated implements ShouldBroadcast
{
    use SerializesModels;

    public $contact;

    /**
     * Create a new event instance.
     *
     * @param \Rinvex\Contacts\Models\Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel($this->formatChannelName());
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'rinvex.contacts.created';
    }

    /**
     * Format channel name.
     *
     * @return string
     */
    protected function formatChannelName(): string
    {
        return 'rinvex.contacts.count';
    }
}
