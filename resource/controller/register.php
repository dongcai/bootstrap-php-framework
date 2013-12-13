<?php

/* 
 * Register Page
 * use php-login-master 
 * 
 */


// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once(LIBRARY_PATH . "/vendors/php-login-master/1-minimal/libraries/password_compatibility_library.php");
}

// load the login class
require_once(LIBRARY_PATH . "/vendors/php-login-master/1-minimal/classes/Registration.php");

// create the registration object. when this object is created, it will do all registration stuff automaticly
// so this single line handles the entire registration process.
$registration = new Registration();

$page_title = 'Register';
$meta_description = 'Register it';

$variables = compact("page_title", "meta_description", "registration");
$pageRender->set($variables);


$pageRender->render();

?>
