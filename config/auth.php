<?php

return [
    'defaults' => [
        'guard' => 'hotel',
        'passwords' => 'hotel_users',
    ],

    'guards' => [
        'hotel' => [
            'driver' => 'session',
            'provider' => 'hotel_users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins', // provider dùng model Admin
        ],
    ],

    'providers' => [
        'hotel_users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // model Admin
        ],
    ],

    'passwords' => [
        'hotel_users' => [
            'provider' => 'hotel_users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
