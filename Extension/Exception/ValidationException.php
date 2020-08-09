<?php

namespace Extension\Exception;

use Nishchay\Exception\BaseException;

/**
 * Description of ValidationException
 *
 * @author bpatel
 */
class ValidationException extends BaseException
{
    const STATUS_CODE = 400;

    public function __construct($message = '', $classOrTraceBack = null, $method = null, $code = E_USER_ERROR, $previous = null)
    {
        parent::__construct($message, $classOrTraceBack, $method, $code, $previous);
    }

}
