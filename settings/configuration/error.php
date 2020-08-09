<?php

return [
    /*
     * Error message to show.
     */
    'show' => [
        'local' => [
            'all' => true,
            'warning' => true,
            'notice' => true,
            'error' => true,
            'other' => true
        ],
        'test' => [
            'all' => false,
            'warning' => false,
            'notice' => false,
            'error' => false,
            'other' => false
        ]
    ],
    /**
     * When error reporting is off, exception handler returns with
     * following error message instead of actual error message.
     * We can also get Actual error message by calling 
     * Detail::getActualMessage()
     */
    'suppressedMessage' => 'Something went wrong'
];
