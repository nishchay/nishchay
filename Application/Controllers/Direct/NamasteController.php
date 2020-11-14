<?php

namespace Application\Controllers\Direct;

use Nishchay;
use Nishchay\Http\Request\RequestStore;

/**
 * Namaste Controller for welcome page.
 *
 * @Controller
 */
class NamasteController
{

    /**
     * Welcome route to say namaste to an application.
     * 
     * @Route(path='namaste',type=GET)
     */
    public function sayNamaste()
    {
        RequestStore::set('name', Nishchay::getApplicationAuthor());
        RequestStore::set([
            'nishchayUrl' => 'https://nishchay.io'
        ]);
        return 'view:namaste';
    }

    /**
     * @Route(see=true)
     */
    public function maintenanceRoute()
    {
        return 'error/maintenance';
    }

}
