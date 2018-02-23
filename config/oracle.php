<?php

return [
    'oracle' => [
            'driver'        => 'oracle',
            'tns'           => env('DB_TNS', 'orcl'),
            'host'          => env('DB_HOST', '192.168.25.99'),
            'port'          => env('DB_PORT', '1521'),
            //'database'      => env('DB_DATABASE', 'orcl'),
            'username'      => env('DB_USERNAME', 'zanchi'),
            'password'      => env('DB_PASSWORD', 'zanchi'),
            'charset'       => env('DB_CHARSET', 'AL32UTF8'),
            'prefix'        => env('DB_PREFIX', ''),
            'prefix_schema' => env('DB_SCHEMA_PREFIX', 'zanchi'),
        ],
];
