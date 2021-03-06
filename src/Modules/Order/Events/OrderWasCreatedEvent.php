<?php

namespace Modules\Order\Events;

use Foundation\Abstracts\Events\Event;
use Modules\Order\Entities\Order;
use Modules\Order\Listeners\SendOrderToDiscord;

class OrderWasCreatedEvent extends Event
{

    /**
     * The listeners that will be fired when the event is dispatched.
     * @var array
     */
    public $listeners = [SendOrderToDiscord::class];

    /**
     * @var Order
     */
    public $order;

    /**
     * Create a new event instance.
     *
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
