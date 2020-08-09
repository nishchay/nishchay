<?php

use Nishchay\Utility\SystemUtility;
use Nishchay\Utility\URI;
use Nishchay\Utility\StringUtility;
use Nishchay\Utility\DateUtility;

/**
 * Returns environment value if set or default as specified in second argument.
 * This function is alias of Nishchay\Utility\System::getEnvironmentValue.
 * 
 * @param   string  $name
 * @param   mixed   $default
 */
function getEnvironment($name, $default = FALSE)
{
    $value = SystemUtility::getEnvironmentValue($name);

    if ($value === false) {
        $value = Nishchay::getEnv($name);
    }

    return $value === false ? $default : $value;
}

/**
 * Returns base URL to application. 
 * It's return base url + following.
 * Suppose you have passed $following = account/login it returns 
 * http://example.com/account/login
 * 
 * @param   string      $following
 * @return  string
 */
function getBaseURL($following = '')
{
    return URI::getBaseURL($following);
}

/**
 * Returns path to resouces.
 */
function getResourceURL($following = '')
{
    return getBaseURL(RESOURCE_NAME . '/' . $following);
}

/**
 * Returns current URL.
 */
function getCurrentURL()
{
    return URI::getCurrentURL();
}

/**
 * Alias of Nishchay::getLang()->line().
 * 
 * @param string $key
 * @param array $placeholder
 * @param string $namespace
 * @return string
 */
function l($key, $placeholder = [], $namespace = null)
{
    return Nishchay::getLang()->line($key, $placeholder, $namespace);
}

/**
 * Alias of StringUtility::htmlEscape.
 * 
 * @param type $string
 * @return type
 */
function e($string)
{
    return StringUtility::htmlEscape($string);
}

/**
 * Returns Datetime instance with current time.
 * 
 * @return \DateTime
 */
function dt()
{
    return DateUtility::getNow();
}

/**
 * Returns TRUE if request is ajax
 * 
 * @return bool
 */
function isAJAX()
{
    return Nishchay\Http\Request\Request::isAJAX();
}
