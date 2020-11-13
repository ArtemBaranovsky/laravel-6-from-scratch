<?php

namespace App\Events;

//use Illuminate\Broadcasting\Channel;
//use Illuminate\Broadcasting\InteractsWithSockets;
//use Illuminate\Broadcasting\PresenceChannel;
//use Illuminate\Broadcasting\PrivateChannel;
//use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductPurchased
{
    use Dispatchable,/* InteractsWithSockets,*/ SerializesModels;
    public $name;

    /**
     * Create a new event instance.
     *
     * @param $name
     */
//    public function __construct(Product $name)  // in a real life with the type of model
    private function __construct($name)
    {
        //
        $this->name = $name;
    }
}
