<?php

namespace App\Providers;

use App\Notifications\NotificationChannel;
use Illuminate\Support\ServiceProvider;

class MailProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(NotificationChannel::class, function ($app) {
            $config = config('notification.channels.email');
            $smsClass = $config['to'];
            return new $smsClass();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
