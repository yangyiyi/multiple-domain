<?php

return [
    'sequence' => (int) env('APP_API_SEQUENCE', 2),
    'namespace' => env('APP_API_NAMESPACE', null),
    'domain' => [
        'url' => str_replace(['https://', 'http://'], '', env('APP_API_URL', 'localhost.com')),
        'prefix' => env('APP_API_DOMAIN_PREFIX', 'api'),
    ],
    'as' => env('APP_API_AS', 'api'),
    'filename' => 'api.php'
];
