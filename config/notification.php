<?php

use App\Notifications\Channels\EmailChannel;
use App\Notifications\Channels\SmsChannel;

return [

    'default' => 'email',

    'channels' => [
        'email' => [
            'class' => EmailChannel::class,
            'from' => 'admin@example.com',
        ],
        'sms' => [
            'class' => SmsChannel::class,
            'api_key' => 'key',
        ],
    ]
];