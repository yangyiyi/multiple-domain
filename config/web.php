<?php

return [
    'sequence' => (int) env('APP_SEQUENCE', 1),
    'namespace' => env('APP_NAMESPACE', null),
    'domain' => [
        'url' => str_replace(['https://', 'http://'], '', env('APP_URL', 'localhost.com')),
        'prefix' => env('APP_DOMAIN_PREFIX', null),
    ],
    'as' => env('APP_AS', null),
    'filename' => 'web.php'
];
