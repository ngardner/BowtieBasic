<?php
/**
 * BowtieFW (http://BowtieFW.com)
 *
 * @link      http://BowtieFW.com
 * @copyright Copyright (c) 2016 Nathan Gardner @ngardner nathan@factory8.com
 * @license   GNU GENERAL PUBLIC LICENSE
 */

namespace BowtieFW;

require('config/enviroment.php');
require('config/init.php');

// start session
session_start();

$objDispatcher = new Dispatcher;
$objDatabase = new Database(DB_SERVER,DB_PORT,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// start up
try {
	
	$objDispatcher->setDirectory('frontend'); // this sets what controllers / views to use
	$objDispatcher->parseUrl($params['_urlrequest']);
	$objDispatcher->dispatch();
	
} catch(Exception $e) {
	
	$objDispatcher->error500($e->getMessage());
	
}

// time to clean up
$objDatabase->disconnect();

?>