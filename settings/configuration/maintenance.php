<?php

return [
    /*
     * Nishchay check for maintenance only if below flag set to TRUE.
     * When all timed,agent and callback are not acive, maintenance will
     * be activated for all request. Allowed is applicable if ignoreAllowed is
     * FALSE and any of allowed type is active.
     */
    'active' => false,
    /*
     * When set to TRUE allowed will not be considered.
     */
    'ignoreAllowed' => true,
    /**
     * When all timed, agent and callback are inactive.
     * Maintenance mode will be activated for all routes and below route
     * will be called as maintenance route.
     */
    'route' => 'maintenanceRoute',
    /*
     * Acitve within given time slots.
     */
    'timed' => [
        'active' => false,
        /*
         * Time is 24 hours format.
         * First element is start and end time.
         * You can set multiple time slots in below list. 
         */
        'list' => [
            [
                ['17:10', '18:30'], null, 'maintenance window'
            ],
            [
                [
                    'YY-MM-DD HH:MM:SS',
                    'YY-MM-DD HH:MM:SS'
                ],
                'route_for_this_slot'
            ]
        ],
        'default' => 'maintenanceRoute'
    ],
    /*
     * When Active
     * If invert is FALSE, active for given agent list only.
     * If invert is TRUE, active for other then given agents.
     */
    'agent' => [
        'active' => false,
        'invert' => false,
        'list' => [
            ['firefox', null, 'firefox maintenance'],
            ['chrome', 'routeForThisAgent']
        ],
        'default' => 'maintenanceRoute'
    ],
    /*
     * Active when callback return TRUE 
     */
    'callback' => [
        'active' => false,
        'list' => [
            ['Application\\Controllers\\Namaste::checkMaintenance', null, 'Weekly check'],
            ['classname::method', 'route_for_this_callback']
        ],
        'default' => 'maintenanceRoute'
    ],
    /*
     * When maintenance mode is active and ignoreAllowed is FALSE 
     * below routes are still executed.
     */
    'allowed' => [
        /*
         * Context names
         */
        'context' => [
            'active' => false,
            'list' => [
                'Application'
            ]
        ],
        /*
         * Routes
         */
        'route' => [
            'active' => false,
            'list' => [
                [
                    /*
                     * Type can be fixed,prefix or regex
                     */
                    'type' => 'regex',
                    /*
                     * What to match
                     */
                    'match' => '^special/(\d+)$'
                ]
            ]
        ],
        /*
         * Named scopes
         */
        'scope' => [
            'active' => false,
            'list' => [
            ]
        ]
    ]
];

