<?php

namespace Application\Controllers\Service;

use Application\Forms\Login;
use Application\Forms\Register;
use Application\Features\Account as AccountFeature;
use Nishchay\Prototype\Account\Account as AccountPrototype;
use Application\Entities\User;

/**
 * Account service controller.
 * 
 * @Controller
 * @Routing(prefix='user',case=camel)
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
    public function authorize(AccountPrototype $accountPrototype)
    {
        $response = $accountPrototype->getAuth(User::class)
                ->setForm(Login::class)
                ->execute();
        return $response->isSuccess() ? $response->getAccessToken() : $response->getErrors();
    }

    /**
     * Creates an account of user.
     * 
     * @Service(token=false)
     * @Route(see=true,type=POST)
     * @Response(type=JSON)
     */
    public function register(AccountPrototype $accountPrototype)
    {
        $register = $accountPrototype->getRegister(User::class);
        $response = $register
                ->setForm(Register::class)
                ->setIgnoreFileds([$register->getForm()->getTerms()->getName()])
                ->execute();

        return $response->isSuccess() ? $response->getAccessToken() : $response->getErrors();
    }

    /**
     * Returns user detail
     * 
     * @Service
     * @NamedScope(name=user)
     * @Route(path='/',type=GET)
     * @Response(type=JSON)
     */
    public function getUserDetail(AccountFeature $accountFeature)
    {
        return $accountFeature->getUser((int) $this->service->getUserId());
    }

}
