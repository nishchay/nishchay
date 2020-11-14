<?php

return [
    /**
     * Set to FALSE to completely disable cache within application.
     */
    'enable' => false,
    'config' => [
        'main' => [
            'type' => 'memcached',
            /**
             * You can specify list or single server
             */
            'server' => [
                [
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 0
                ]
            ],
            /**
             * Set to FALSE to disable this caching
             */
            'offline' => false,
            /**
             * Key will be MD5 hashed before it used.
             */
            'hash' => true
        ]
    ],
    /**
     * Default cache
     */
    'default' => 'main',
    /**
     * Which cache to use database
     */
    'database' => [
        /**
         * If you don't specify cache name for database connection name then
         * this cache name will be used.
         * If there's no cache name in default and database connection then 
         * no cache will be used.
         */
        'default' => null,
        'connection' => [
            'main' => 'main',
            'postgre' => null,
            'mssql' => null
        ]
    ]
];
