<?php

namespace Application\Controllers\Direct;

/**
 * Static Controller
 *
 * @Controller
 * @Routing(pattern=actionMethod)
 */
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
