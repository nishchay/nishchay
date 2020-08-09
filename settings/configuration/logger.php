<?php

return [
    /**
     * Enable or disable application logging.
     */
    'enable' => true,
    /**
     * Where to store application log.
     * Supported types are file and db.
     * 
     */
    'type' => 'file',
    /**
     * Path to directory where logs file will be generated.
     */
    'path' => ROOT . 'logs',
    /**
     * Applicable of log type db.
     */
    'db' => [
        /**
         * Database connection name.
         * NULL means default connection as configured in database.php setting.
         */
        'connection' => null,
        /**
         * Table where logs will be stored.
         */
        'table' => 'RequestLog',
    ],
    /**
     * This is to group log as per its duration.
     * Suppose duration is week and type is file.
     * Then this will create new file on each start of week.
     * Supported values are
     * 
     * 1. date: Groups logs every day.
     * 2. week: Groups logs every week.
     * 3. Biweek: Groups logs every two week.
     * 4. month: Groups logs every month.
     */
    'duration' => 'date',
];

