<?php

return [
    /**
     * Enable or disable localization.
     */
    'enabled' => true,
    'locale' => [
        /**
         * Main locale from which translation will be fetched.
         */
        'main' => 'english',
        /**
         * If the translation does not found in main locale then translation
         * fetched from below mentioned locale.
         * If default locale is not valid or does not contains translation
         * then exception is thrown.
         */
        'default' => 'english'
    ],
    /**
     * How lang should be loaded
     * Can be file or db
     */
    'type' => 'file',
    /**
     * Applicable only when loader is file
     */
    'file' => [
        /**
         * Type of file in which lang should be stored.
         * PHP or JSON
         */
        'type' => 'json',
        /**
         * Path where lang should be stored.
         */
        'path' => SETTINGS . 'lang' . DS
    ],
    /**
     * Applicable only when loader is db
     */
    'db' => [
        /**
         * Should be name of database connection.
         * Keep null to use default database connection.
         */
        'connection' => null,
        /**
         * If you are storing all translations into one table than table should
         * have locale as column.
         * You can also store translation locale wise in its table. In this case
         * below value should be: table
         * 
         * Locale table name follows AppLang{locale} format.
         * 
         * Example: For locale english, table will be AppLangEnglish
         */
        'localAs' => 'column',
        /**
         * Applicable when you store all translations into one table.
         */
        'table' => 'AppTranslations',
        /**
         * Because translation loading from DB its good to have cache.
         * 
         * If you don't want to cache then set below value to false.
         * 
         * Cache key follows {table}_{locale}_{namespace} format.
         * If you have set hash = true in cache config then do MD5 of above to
         * get actual cache key.
         */
        'cacheEpiry' => 3600
    ]
];
