<?php

namespace App\Listeners;

use App\Jobs\ProcessBook;
use App\Events\BookCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBookCreatedNotification
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
    public function handle(BookCreated $event): void
    {
       echo "Esto es un ejemplo de lo que podría hacer este evento. En este caso envio un email";

       ProcessBook::dispatch($event->book);
    }
}
