<?php
return [
    'defaults' => [
        'guard' => 'hotel', // ✅ đổi thành hotel
        'passwords' => 'hotel_users',
    ],

    'guards' => [
        'hotel' => [
            'driver' => 'session',
            'provider' => 'hotel_users',
        ],
    ],

    'providers' => [
    'hotel_users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class, // ✅ Đúng model
    ],
],


    'passwords' => [
        'hotel_users' => [
            'provider' => 'hotel_users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
