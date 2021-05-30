<?php

namespace Application\Controllers\Direct;

use Nishchay\Attributes\Controller\{
    Controller,
    Routing
};

/**
 * Static Controller
 *
 * @Controller
 * @Routing(pattern=actionMethod)
 */
#[Controller]
#[Routing(pattern: 'actionMethod')]
interface StaticController
{

    /**
     * Page for about your application.
     */
    public function actionGetAboutUs();

    /**
     * Page for application help.
     */
    public function actionGetHelp();

    /**
     * Page for application terms and conditions.
     */
    public function actionGetTerms();
}
