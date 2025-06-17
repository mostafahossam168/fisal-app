<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductEvent  implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    /**
     * Create a new event instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('fisal-app'),
        ];
    }

    public function broadcastAs()
    {
        return 'product-event';
    }

    public function broadcastWith()
    {
        return [
            'product_id' => $this->product->id,
            'product_name' =>  $this->product->name,
        ];
    }
}
