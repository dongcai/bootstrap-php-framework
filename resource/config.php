<?php

//SET TO 0 when go live
defined("DEBUG") or define("DEBUG", '1');

defined("SITE_BASE_URL") or define("SITE_BASE_URL", "http://denix.dev");
//change assets url to support new boostrap
defined("ASSETS_URL") or define("ASSETS_URL", SITE_BASE_URL . "/" . "assets3");
defined("SITE_NAME") or define("SITE_NAME", "deniX");

defined("LIBRARY_PATH") or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
defined("TEMPLATE_PATH") or define("TEMPLATE_PATH", realpath(dirname(__FILE__) . '/template'));
defined("CONTROLLER_PATH") or define("CONTROLLER_PATH", realpath(dirname(__FILE__) . '/controller'));
defined("DATA_PATH") or define("DATA_PATH", realpath(dirname(__FILE__) . '/data'));


define("DB_CONNECOTR", "classic"); //or PDO
//if you choose databasePDO as your database venror at resource/library/core/DatabaseConnector.php
//then you can also choose "sqlite" as DB_TYPE
define("DB_TYPE", "mysql");
define("DB_NAME", "caibaiwan");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_HOST", "localhost");

//Session Expiration Control
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 600) {
    // idle more than 10 minates ago
    session_destroy();
    $_SESSION = array();
} else {
    $_SESSION['CREATED'] = time();
}

//Session Auto Start Control
$_session_id = session_id();
if (empty($_session_id))
    session_start();
unset($_session_id);


if(DEBUG){
    ini_set("error_reporting", "true");
    error_reporting(E_ALL | E_STRCT);
}


?>
