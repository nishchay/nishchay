<?php

return [
    /*
     * Application information
     */
    'application' => [
        /*
         * Name of your application.
         */
        'name' => '{APP_NAME}',
        /*
         * Author of the application.
         */
        'author' => '{AUTHOR_NAME}',
        /*
         * Stage of the application any from below
         * 1. local
         * 2. test
         * 3. live
         */
        'stage' => 'local',
        /*
         * Version of the application,
         * This can number or any name.
         */
        'version' => '1.0.0',
    ],
    'config' => [
        /*
         * Allowed file types.
         * Extensions separated by '|'.
         */
        'fileTypes' => 'php|html|twig'
    ],
    'session' => [
        /*
         * Session data should be stored to.
         * 1. file      : To File. storage_path must be set.
         * 2. db        : Database (Application must be connected to database.)
         * 3. cache
         */
        'storage' => 'file',
        /**
         * Applicable only when storage is file.
         * This path should be absolute.
         */
        'storagePath' => PERSISTED . 'sessions',
        /*
         * Applicable only when storage is DB.
         */
        'db' => [
            /**
             * Connection name as declared in database setting, NULL menas use
             * default connection as specified in database setting.
             */
            'connection' => null,
            /**
             * Table name. Setting NULL will use default name 'session'.
             */
            'table' => null
        ],
        /*
         * Applicable only when storage is cache.
         * 
         * Every time request is made to applicaiton and session is used
         * for first time, sesion expiry time is refreshed. Means it will
         * again set expiry to below second.
         * 
         */
        'cache' => [
            /**
             * Cache config name, NULL means it will default cache config as
             * defined in cache config.
             */
            'name' => null,
            /**
             * Cache expiry time in seconds. This should be greater than 5min (300 sec).
             */
            'expiry' => 1800
        ]
    ],
    /**
     * Below setting is used while fetching client IP.
     */
    'proxy' => [
        /**
         * Enable or disable
         */
        'active' => true,
        /**
         * Header from which IP need to be looked at.
         */
        'header' => 'X-FORWARDED-FOR',
        /**
         * Trusted IP.
         */
        'ip' => [
        ]
    ]
];
