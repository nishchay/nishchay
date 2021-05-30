<?php

namespace Application\Controllers\Service;

use Application\Forms\Login;
use Application\Forms\Register;
use Application\Features\Account as AccountFeature;
use Nishchay\Prototype\Account\Account as AccountPrototype;
use Application\Entities\User;
use Nishchay\Attributes\Controller\Property\Service as ServiceProperty;
use Nishchay\Attributes\Controller\{
    Controller,
    Routing
};
use Nishchay\Attributes\Controller\Method\{
    Route,
    Response,
    Service
};

/**
 * Account service controller.
 * 
 * @Controller
 * @Routing(prefix='user',case=camel)
 */
#[Controller]
#[Routing(prefix: 'user', case: 'camel')]
class Account
{

    /**
     * 
     * @var \Nishchay\Service\Service
     */
    #[ServiceProperty]
    private $service;

    /**
     * Authenticates user and returns token to access all service which requires token.
     * 
     */
    #[Service(token: false)]
    #[Route(path: true, type: 'POST')]
    #[Response(type: 'json')]
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
     */
    #[Service(token: false)]
    #[Route(path: true, type: 'POST')]
    #[Response(type: 'json')]
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
     */
    #[Service]
    #[Route(path: '/', type: 'GET')]
    #[Response(type: 'json')]
    public function getUserDetail(AccountFeature $accountFeature)
    {
        return $accountFeature->getUser((int) $this->service->getUserId());
    }

}
