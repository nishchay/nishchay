<?php

/**
 * If you want to make whole application web service, then set enable value to
 * true. This will make all routes within application behave as web service. By
 * this you do not have to annotate each route with @Service annotation. If this
 * is true and default response type is view, Nishchay will throw exception.
 */
return [
    /**
     * Enable service throughout application.
     * FALSE will not disable service within application.
     */
    'enable' => false,
    /**
     * Methods to be called before checking service and after preparing response 
     */
    'event' => [
        /**
         * This will be called before service checker verifies access token or
         * fields demand. You might need this when you use nishchay token
         * verifier as it requires valid token to be set in session so that it
         * can be checked token received in request.
         * 
         * NOTE: callback must return array.
         */
        'before' => false,
        /**
         * Once you set callback returned response from route will be returned to
         * given callback so that you can create your own type of service response.
         * 
         * Route response first filtered based on request and service setting.
         * NOTE: callback must return array.
         */
        'after' => false,
    ],
    /**
     * By default each service can be accessed without token, by updating
     * enable to TRUE will make service to be accessible with token only.
     */
    'token' => [
        'enable' => true,
        /**
         * Where to pass token.
         * Header or GET parameter
         */
        'where' => 'header',
        /**
         * Token name.
         * Recommendation: If using GET then set name to 'token'.
         */
        'name' => 'X-Service-Token',
        /**
         * Session name in which token value should be saved.
         * This is required when Nishchay internal token system is used.
         * You will have to set generated token in internal session with below
         * session name.
         * 
         * Not required if  oatuh token is used.
         * This is based on `verifyCallback` setting.
         */
        'sessionName' => 'service_token',
        /**
         * Whether to use Nishchay internal token checker or mention here 
         * your callback which will verify token.
         * Callback must return boolean value.
         * 
         * Nishchay will call this callback with parameter token value after
         * checking if token has been passed in header or request parameter.
         */
        'verifyCallback' => 'oauth',
        /**
         * OAuth configurations
         */
        'oauth' => [
            /**
             * Private to be use for generating token
             */
            'privateKey' => dirname(__DIR__) . DS . 'keys' . DS . 'private.key',
            /**
             * Public to be use for verifying token
             */
            'publicKey' => dirname(__DIR__) . DS . 'keys' . DS . 'public.key',
            /**
             * 
             */
            'credential' => [
                /**
                 * Your application id to be used in generating and verifying token
                 */
                'appId' => '{SERVICE_APP_ID}',
                /**
                 * Secret to be use along with app id.
                 */
                'appSecret' => '{SERVICE_APP_SECRET}'
            ],
            /**
             * Access token expiry time
             */
            'expiry' => 30,
            /**
             * Enable or disable refresh token to be generated along with accessToken.
             * 
             * Once access token is generated using client credential or user credential. 
             * OAuth can also generate refresh token. 
             * 
             * When access token is expired, new access token can be generated using refresh token
             */
            'refreshToken' => [
                'enable' => true,
                /**
                 * Refresh token expiry time.
                 * 
                 * This must be greater than access token expiry time.
                 */
                'expiry' => 3600,
                /**
                 * Entity where refresh token data will be stored.
                 */
                'entity' => Application\Entities\RefreshToken::class
            ]
        ]
    ],
    /**
     * When you missed responding some field then Nishchay adds field in response
     * with default value mentioned here.
     * Example:
     * Suppose you set service to return [id,name,profilePicture] and missed 
     * responding profilePicture then it will respond with default value mentioned
     * here.
     */
    'default' => null,
];
