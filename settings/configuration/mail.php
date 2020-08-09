<?php

return [
    'config' => [
        'main' => [
            'type' => null,
            'host' => 'localhost',
            'port' => 1025,
            'credential' => [
                'username' => '',
                'password' => ''
            ],
            'from' => 'info@example.com'
        ]
    ],
    'default' => [
        /*
         * Defaul mail config name.
         */
        'config' => 'main'
    ]
];
