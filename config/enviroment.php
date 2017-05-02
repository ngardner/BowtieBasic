<?php
/**
 *  This file sets up enviroment variables such as directory paths
 */
namespace BowtieFW;

/**
 * Setting error reporting
 */
ini_set('display_errors','On');
error_reporting(E_ALL);

/**
 * Defining constants
 */
define('PRODUCT_NAME','Bowtie Basic');
define('INSTALLDIR','/temp'); // start with slash, but dont end with one. If no sub dir, leave blank
define('DIR',$_SERVER['DOCUMENT_ROOT'].INSTALLDIR.'/'); // always end with slash
define('URL','http://'.$_SERVER['HTTP_HOST'].INSTALLDIR.'/'); // always end with slash
define('DB_SERVER','localhost');
define('DB_PORT','3306');
define('DB_USERNAME','');
define('DB_PASSWORD','');
define('DB_DATABASE','');
ini_set('magic_quotes_sybase',0);

/**
 * Localization
 */
date_default_timezone_set('America/Chicago');

/**
 * setup params var
 * DO NOT MODIFY
 */
$params = array_merge($_GET,$_POST); // merge GET and POST
$_GET = $_POST = array(); // shouldn't access these directly
$params['uploads'] = !empty($_FILES)?$_FILES:false; // for FILE uploads
$params['_urlrequest'] = !empty($params['_urlrequest'])?$params['_urlrequest']:false; // for routing

?>
