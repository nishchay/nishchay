<?php

/**
 * -------------------------------------------------
 * Nishchay START TIME
 * -------------------------------------------------
 * 
 * You may need this to find how much time took to accomplish your Nishchay or to know when it started.
 */
define('Nishchay_START_TIME', time());
date_default_timezone_set('Asia/Kolkata');

/**
 * Shorthand for DIRECTORY_SEPARATOR.
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * Path to root directory of the application.
 */
define('ROOT', dirname(__DIR__) . DS);

/**
 * Path to settings directory.
 */
define('SETTINGS', dirname(__DIR__) . DS . 'settings' . DS);

/**
 * Directory name where resources like images, JS are placed.
 */
define('RESOURCE_NAME', 'resources');

/**
 * Absolute path to resources.
 */
define('RESOURCES', ROOT . 'public' . DS . RESOURCE_NAME . DS);

/**
 * -------------------------------------------------
 * COMPOSER AUTOLOADER
 * -------------------------------------------------
 * 
 * Let's give the work of locating classes to composer.
 */
require_once ROOT . 'vendor/autoload.php';

