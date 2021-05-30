<?php

namespace Application\Handler;

use Nishchay\Attributes\Handler\Handler;

/**
 * Global error handler for application.
 *
 * @Handler(type=global)
 */
#[Handler(type: 'global')]
class ErrorHandler
{

    /**
     * Will be called when requested route is not found.
     * @return string
     */
    public function requestNotFoundException()
    {
        return 'view:error/notFound';
    }

}
