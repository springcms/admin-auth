<?php

return [    

        'guards' => [
                'admin' => [
                    'driver' => 'session',
                    'provider' => 'admins',
                ],
                'apicustom' => [
                    'driver' => 'apijson',
                    'provider' => 'apispring',
                ],
            ],
        'providers' => [
            'admins' => [
                'driver' => 'eloquent',
                'model' => SpringCms\AdminAuth\Models\Admin::class,
            ],
            'apispring' => [
                'driver' => 'apispring',                
            ],
        ],

        'passwords' => [
            'admins' => [
                'provider' => 'admins',
                'table' => 'password_resets',
                'expire' => 60,
            ],

        ],
];
