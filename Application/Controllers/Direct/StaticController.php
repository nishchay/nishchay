<?php

namespace Application\Controllers\Direct;

/**
 * Description of StaticController
 *
 * @Controller
 */
class StaticController
{

    /**
     * About us.
     * 
     * @Route(see=true,type=GET)
     */
    public function aboutUS()
    {
        return 'static/aboutUs';
    }

    /**
     * Page for application help.
     * 
     * @Route(see=true,type=GET)
     */
    public function help()
    {
        return 'static/help';
    }

    /**
     * Page for application terms and conditions.
     * 
     * @Route(see=true,type=GET)
     */
    public function terms()
    {
        return 'static/terms';
    }

}
