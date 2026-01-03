<?php 

namespace App\Notifications\Channels;

use App\Notifications\NotificationChannel;

class EmailChannel implements NotificationChannel
{
    public function __construct(protected string $from){}
    public function send(string $message)
    {
        logger($message);
    }
}