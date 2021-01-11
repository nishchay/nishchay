<?php

return [
    'config' => [
        'main' => [
            'key' => '{PUT_YOUR_MAIN_KEY_HERE}',
            'cipher' => 'aes-256-cbc'
        ],
        'db' => [
            'key' => '{PUT_YOUR_DB_KEY_HERE}',
            'cipher' => 'aes-256-ecb'
        ]
    ],
    'default' => 'main'
];
