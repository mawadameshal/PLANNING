<?php

return [
    'oracle' => [
        'driver' => 'oracle',
        'host' => '10.50.200.172',
        'port' => '1521',
        'service_name' => 'devDb',
        'username' => 'planning_admin',
        'password' => 'IV6OCRS__TJr1Wi',
        'charset' => 'utf8',
        'prefix' => '',

        'tns'            => env('DB_TNS', ''),
        // 'host'           => env('DB_HOST', ''),
        // 'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', ''),
        // 'username'       => env('DB_USERNAME', ''),
        // 'password'       => env('DB_PASSWORD', ''),
        // 'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        // 'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
];

