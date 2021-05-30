<?php

namespace Application\Controllers\Direct;

use Nishchay;
use Nishchay\Http\Request\RequestStore;
use Nishchay\Attributes\Controller\Method\Route;
use Nishchay\Attributes\Controller\{
    Controller,
    Routing
};

/**
 * Namaste Controller for welcome page.
 *
 */
#[Controller]
#[Routing(pattern: 'crud')]
class NamasteController
{

    /**
     * Welcome route to say namaste to an application.
     */
    #[Route(path: 'namaste', type: 'GET')]
    public function sayNamaste()
    {
        RequestStore::set('name', Nishchay::getApplicationAuthor());
        RequestStore::set([
            'nishchayUrl' => 'https://nishchay.io'
        ]);
        return 'view:namaste';
    }

    /**
     * Maintenance route
     */
    #[Route(path: true, incoming: false)]
    public function maintenanceRoute()
    {
        return 'error/maintenance';
    }

}
