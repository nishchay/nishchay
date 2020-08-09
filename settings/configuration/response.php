<?php

return [
    /**
     * Default response of route.
     * Suppose you are making whole application web service then set this value
     * to JSON or XML.
     */
    'default' => 'VIEW',
    /**
     * View file locator.
     * Setting NULL will use Nishchay view locator.
     * Should be class name and it should be located in Extension directory. 
     * Locator must contain getPath which returns absolute path to view.
     * Remove 'Extension' from class name. 
     * Example:
     * Suppose Class name is Extension\View\Locator, then value should be
     * 'View\Locator'.
     */
    'locator' => null,
    /**
     * Template engine
     */
    'templating' => [
        /**
         * NULL means Nishchay will use TWIG template 
         * To use some other template engine, define it in callback implementation.
         * Place callback in 'Extension' namespace.
         * For callback do not prefix it with 'Extension'.
         * Example:
         * Your callback located at Extension\View::templating
         * Then value of this config should be 'View::templating'.
         */
        'engine' => null,
        /**
         * To enable or disable template caching
         */
        'caching' => true,
        /**
         * Applicable for TWIG template engine only .
         * Twig doesn't allow php function to be executed in twig template but
         * setting below setting to true will allow it.
         */
        'phpFunction' => true,
    ],
];

