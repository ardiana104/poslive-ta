<?php

return [
    'name' => 'POSLIVE',
    'manifest' => [
        'name' => env('APP_NAME'),
        'short_name' => 'POSLIVE',
        'start_url' => '/poslive/public',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => '/poslive/public/storage/logos/logo-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/poslive/public/storage/logos/logo-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/poslive/public/storage/logos/logo-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/poslive/public/storage/logos/logo-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/poslive/public/poslive/public/storage/logos/logo-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/poslive/public/storage/logos/logo-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/poslive/public/storage/logos/logo-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/poslive/public/storage/logos/logo-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/poslive/public/storage/logos/splash-640x1136.png',
            '750x1334' => '/poslive/public/storage/logos/splash-750x1334.png',
            '828x1792' => '/poslive/public/storage/logos/splash-828x1792.png',
            '1125x2436' => '/poslive/public/storage/logos/splash-1125x2436.png',
            '1242x2208' => '/poslive/public/storage/logos/splash-1242x2208.png',
            '1242x2688' => '/poslive/public/storage/logos/splash-1242x2688.png',
            '1536x2048' => '/poslive/public/storage/logos/splash-1536x2048.png',
            '1668x2224' => '/poslive/public/storage/logos/splash-1668x2224.png',
            '1668x2388' => '/poslive/public/storage/logos/splash-1668x2388.png',
            '2048x2732' => '/poslive/public/storage/logos/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'poslive shortcut 1 icon',
                'url' => '/poslive/public/storage/logos/logo-72x72.png',
                'icons' => [
                    "src" => "/poslive/public/storage/logos/logo-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'poslive shortcut 1 icon',
                'url' => '/poslive/public/storage/logos/logo-96x96.png'
            ]
        ],
        'custom' => []
    ]
];
