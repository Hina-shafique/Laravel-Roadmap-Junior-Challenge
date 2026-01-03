<?php 

namespace App\Notifications;

interface NotificationChannel
{
    public function send(string $message);
}