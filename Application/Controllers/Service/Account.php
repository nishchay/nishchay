<?php

namespace Application\Controllers\Service;

use Application\Forms\Login;
use Application\Forms\Register;
use Nishchay\Http\Response\Response;
use Application\Features\Account as AccountFeature;

;

/**
 * Account service controller.
 * 
 * @Controller
 * @Routing(prefix='this.after:Application\Controllers',case=camel)
 */
class Account
{

    /**
     * 
     * @Service
     * 
     * @var \Nishchay\Service\Service
     */
    private $service;

    /**
     * Authenticates user and returns token to access all service which requires token.
     * 
     * @Service(token=false)
     * @Route(see=true,type=POST)
     * @Response(type=JSON)
     */
    public function login(Login $loginForm, AccountFeature $accountFeature)
    {
        # Validating form. If this returns false we will send all validation
        # error as response.
        if ($loginForm->validate() === false) {

            # Because we got validation error, setting response header
            # status to 400
            Response::setStatus(HTTP_STATUS_BAD_REQUEST);
            return [
                'error' => 'Validation failed',
                'type' => 'ValidationError',
                'validationErrors' => $loginForm->getErrors()
            ];
        }

        # Authenticates and makes user login
        $result = $accountFeature->doLogin($loginForm);

        # Now setting token in session for service.
        $this->service->setToken($result['token']);

        return $result;
    }

    /**
     * Creates an account of user.
     * 
     * @Service(token=false)
     * @Route(see=true,type=POST)
     * @Response(type=JSON)
     */
    public function register(Register $registerForm, AccountFeature $accountFeature)
    {

        # Validating form. If this returns false we will send all validation
        # error as response.
        if ($registerForm->validate() === false) {

            # Because we got validation error, setting response header
            # status to 400
            Response::setStatus(HTTP_STATUS_BAD_REQUEST);
            return [
                'error' => 'Validation failed',
                'type' => 'ValidationError',
                'validationErrors' => $registerForm->getErrors()
            ];
        }

        # Creating user account.
        $result = $accountFeature->doRegister($registerForm);

        # Now setting token in session for service.
        $this->service->setToken($result['token']);

        return $result;
    }

    /**
     * Returns user detail
     * 
     * @Service
     * @NamedScope(name=secure)
     * @Route(path='{userId}',type=GET)
     * @Placeholder(userId=number)
     * @Response(type=JSON)
     */
    public function getUserDetail(AccountFeature $accountFeature, $userId = '@Segment(index="userId")')
    {
        return $accountFeature->getUser((int) $userId);
    }

}
