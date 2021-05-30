<?php

return [
    'landing' => 'namaste',
    'patterns' => [
        'custom' => [
            /**
             * This setting is for route annotation.
             * 
             * NULL: makes route annotation optional
             * TRUE: makes route annotation required
             */
            'route' => null,
            /**
             * This setting is for NamedScope annotation.
             * 
             * NULL: makes annotation optional
             * TRUE: makes annotation required
             * Array of scopes: applies list of mentioned scope to route.
             * 
             * To disallow annotation to be defined on method with list of of named scopes set as:
             * 
             * [
             *  'name' => [List of scopes in array],
             *  'override' => false
             * ]
             */
            'namedscope' => null,
            /**
             * This setting is for Service annotation
             * 
             * NULL: makes annotation optional
             * TRUE: makes annotation required
             * FALSE: Disallows annotation to be defined on method
             * 'all' for making all routes service
             */
            'service' => null,
            /**
             * This setting is for Response annotation
             * 
             * NULL: makes route annotation optional
             * TRUE: makes route annotation required
             * FALSE: Disallows annotation  to be defined on method
             * String: Applies response type to route.
             * 
             * To disallow annotation to be defined on method with response type set here.
             * 
             * [
             *  'type' => 'json',
             *  'override' => false
             * ]
             */
            'response' => 'json',
            /**
             * This callback will be called to build route.
             * 
             * Must returns parameter same as route annotation in an array.
             * 
             * Return FALSE to discard method to be considered as route
             * Return NULL to leave as it is. In this case if there's route
             * annotation on method it will considered.
             */
            'processor' => function(string $class, string $method) {
                return false;
            }
        ]
    ],
    /**
     * Route visibility configuration
     */
    'visibility' => [
        /**
         * Enable or disable
         */
        'active' => true,
        'config' => [
            'test' => [
                /**
                 * Enable or disable this configuration.
                 */
                'active' => true,
                'eligible' => [
                    /**
                     * List of scopes to which this visibility setting will be applied.
                     */
                    'scope' => [
                        'test'
                    ]
                ],
                /**
                 * Define single or multiple visibility conditions.
                 */
                'visible' => [
                    [
                        /**
                         * Visible for given time ranges.
                         * Set null to make visible all time.
                         */
                        'time' => [
                            ['00:00', null]
                        ],
                        /**
                         * Visible for given agents.
                         * Set NULL to make visible for all agents. 
                         */
                        'agent' => [
                            'firefox'
                        ],
                        /**
                         * Visible for list of IPs.
                         * Set NULL to make visible for all IPs
                         */
                        'ip' => [
                            '127.0.0.1'
                        ],
                        /**
                         * Visible if given callback returns TRUE.
                         */
                        'callback' => function() {
                            return true;
                        }
                    ]
                ]
            ]
        ]
    ]
];
