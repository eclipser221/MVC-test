<?php

//ini_set('display_errors', '0');     // don't show any errors...
//error_reporting(E_ALL | E_STRICT);  // but log them

define('SITE_PATH',realpath(dirname(__FILE__)).'\\');
define('CONF_FILE', SITE_PATH . 'config\\config.php');

require(SITE_PATH . 'lib\\confClass.php');
require(SITE_PATH . 'lib\\databaseConnection.php');


require(SITE_PATH . 'application\\request.php');
require(SITE_PATH . 'application\\router.php');
require(SITE_PATH . 'application\\baseController.php');
require(SITE_PATH . 'application\\model.php');
require(SITE_PATH . 'application\\load.php');
require(SITE_PATH . 'application\\registry.php');
require(SITE_PATH . 'controllers\\errorController.php');

try {
   router::route(new request);
} catch(Exception $e) {
    $controller = new errorController;
    $controller->error($e->getMessage());
}
?>