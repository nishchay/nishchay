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
     * @Route(path='namaste')
     */
    public function sayNamaste()
    {
        RequestStore::set('name', Nishchay::getApplicationAuthor());
        RequestStore::set([
            'nishchayUrl' => 'https://nishchay.io'
        ]);
        return 'view:namaste';
    }

}
