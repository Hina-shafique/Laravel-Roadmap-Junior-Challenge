<?php 

namespace App\Notifications\Channels;

use App\Notifications\NotificationChannel;

class SmsChannel implements NotificationChannel
{
    public function __construct(protected string $apikey){}
    public function send(string $message)
    {
        logger($message);
    }
}