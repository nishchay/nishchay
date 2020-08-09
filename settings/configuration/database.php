<?php

return [
    /*
     * Nishchay do not connect to database when the application starts but
     * only when they are in used by at least once.
     */
    'connections' => [
        'main' => [
            /*
             * Database types: mysql, postgresql, mssql(SQL server)
             */
            'type' => 'mysql',
            /*
             * Database name.
             */
            'dbname' => getEnvironment('DB_NAME', 'NishchayDB'),
            /*
             * Host name where database server is located.
             */
            'host' => getEnvironment('DB_HOST', '127.0.0.1'),
            /*
             * Port number on which database server is running.
             */
            'port' => getEnvironment('DB_PORT', 3306),
            /*
             * Username 
             */
            'username' => getEnvironment('DB_USER', 'root'),
            /*
             * Password
             */
            'password' => getEnvironment('DB_PASS', null),
            /*
             * Set connection offline
             */
            'offline' => false,
        ],
        'postgre' => [
            /*
             * Database types: mysql, postgresql, mssql(SQL server)
             */
            'type' => 'postgresql',
            /*
             * Database name.
             */
            'dbname' => getEnvironment('DB_NAME', 'NishchayDB'),
            /*
             * Host name where database server is located.
             */
            'host' => getEnvironment('DB_HOST', '127.0.0.1'),
            /*
             * Port number on which database server is running.
             */
            'port' => getEnvironment('DB_PORT', 5432),
            /*
             * Username 
             */
            'username' => getEnvironment('DB_USER', ''),
            /*
             * Password
             */
            'password' => getEnvironment('DB_PASS', ''),
            /*
             * Set connection offline
             */
            'offline' => true,
        ],
        'mssql' => [
            /*
             * Database types: mysql, postgresql, mssql(SQL server)
             */
            'type' => 'mssql',
            /*
             * Database name.
             */
            'dbname' => getEnvironment('DB_NAME', 'NishchayDB'),
            /*
             * Host name where database server is located.
             */
            'host' => getEnvironment('DB_HOST', '127.0.0.1'),
            /*
             * Port number on which database server is running.
             */
            'port' => getEnvironment('DB_PORT', 1433),
            /*
             * Username 
             */
            'username' => getEnvironment('DB_USER', ''),
            /*
             * Password
             */
            'password' => getEnvironment('DB_PASS', ''),
            /*
             * Set connection offline
             */
            'offline' => true,
        ]
    ],
    /**
     * Default connection environment.
     * This should exist in environment list as specified above.
     */
    'default' => 'main',
    /**
     * Encryption configuration.
     */
    'encryption' => [
        /**
         *  NULL means use Nishchay encryption
         *  Supported types are
         *  1. php - php side callback will be called
         *  2. db - database side function will be wrapped with column
         */
        'type' => null,
        /**
         * When type is NULL then name should be config name as defined
         * in encryption config file.
         * 
         */
        'name' => 'db',
        /**
         * Key is required in case of Nishchay encryption and decryption not used.
         */
        'key' => 'PUT_YOUR_KEY_HERE',
        /**
         * In case of type of db or php side callback use below type of config.
         * NOTE: Nishchay will always pass first and second parameter as value & key.
         * Following parameter should be mentioned in 'parameters' key of below config.
         */
        'callback' => [
            /**
             * Method to use for encryption.
             */
            'encrypt' => [
                'function' => 'AES_ENCRYPT',
                'parameters' => []
            ],
            /**
             * Method to use for decryption
             */
            'decrypt' => [
                'function' => 'AES_DECRYPT',
                'parameters' => []
            ],
        ]
    ],
    /**
     * Whether to allow update statement to be executed without condition.
     */
    'updateNoCondition' => false,
    /**
     * Whether to allow delete statement to be executed without condition.
     */
    'deleteNoCondition' => false,
    /**
     * Below are global values which are apply to each Entity Manager.
     */
    'global' => [
        /**
         * To set derived property while fetching and setting records values.
         */
        'derivedProperty' => true,
        /**
         * To set derived object while fetching and setting record values.
         */
        'lazyProperty' => true,
        /**
         * Whether to refactor database table or table column every time.
         * For the first time you instantiate an entity, Nishchay refactors
         * extra property in table. Nishchay creates this column in table if it
         * does not exist. Nishchay also refactors Nishchay static data table in 
         * database when first instance of any entity is created.
         * 
         * FALSE means Nishchay thinks that table's extra property column 
         * exist in that table and static data table exist in database. Nishchay
         * will not refactor.
         */
        'refactoring' => true,
        /**
         * Whether to refactor static table when first instance of any entity
         * created.
         * FALSE means Nishchay thinks that static data table already been 
         * refactored.
         * NULL means it will use configuration value from above(refactoring).
         */
        'staticRefactoring' => true,
        /**
         * Enable or disable loading values of static properties as soon as
         * first instance of Entity class is created.
         */
        'staticLoading' => true
    ]
];

