<?php

/* --------------------------------------------------------------------------------
 * Turn error reporting on/off
 * -------------------------------------------------------------------------------- */
error_reporting(E_ALL);

/* --------------------------------------------------------------------------------
 * Define the base url for the application
 * -------------------------------------------------------------------------------- */
define('BASE_URL', '/protophp/');

/* --------------------------------------------------------------------------------
 * Define the default route for the application when the URL is empty
 * -------------------------------------------------------------------------------- */
define('DEFAULT_ROUTE', 'home');

/* --------------------------------------------------------------------------------
 * Start tye system
 * -------------------------------------------------------------------------------- */
require_once('application/System.php');
$sys=new System();
$sys->run();