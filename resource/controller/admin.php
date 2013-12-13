<?php

/*
 * admin page
 */

if ($_isAdmin) {
    $pageRender->set("admin_mode", true);
} else {
    header("location: " . SITE_BASE_URL . "/login");
    exit;
}


//boostrap-php-framework convention, controller must be the first parma
//for example, http://deniapps.com/work, work will be the controller
if (count($_params)) {
    $_controller = $_params[0];
    //the rest will be params
    array_shift($_params);
} else {
    $_controller = 'home';
}


//override controller
$pageRender->setController($_controller);

$file = CONTROLLER_PATH . "/" . $_controller . ".php";
$notfound = CONTROLLER_PATH . "/notfound.php";
if (file_exists($file)) {
    require_once $file;
} elseif (file_exists($notfound)) {
    header("HTTP/1.1 404 Not Found");
    require_once $notfound;
} else {
    echo "missing notfound controller!!!";
    exit;
}