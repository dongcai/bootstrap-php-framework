<?php
//all requests start from here (index)

require_once(realpath(dirname(__FILE__) . "/../resource/config.php"));
require_once(LIBRARY_PATH . "/core/PageRender.php");
require_once(LIBRARY_PATH . "/core/Requester.php");
require_once(LIBRARY_PATH . "/core/DatabaseConnector.php");

require_once(LIBRARY_PATH . "/base_functions.php");
require_once(LIBRARY_PATH . "/common_functions.php");

$_isAdmin = false;

// use php-login-master for Admin login
if (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {
    $_isAdmin = true;
}

//default controller;
$_controller = "home";

//get params from url;
$_params = array();
$_uri = Requestor::get_uri();

$_parts = preg_split('/\//', $_uri);



if ($_uri && count($_parts)) {
    //boostrap-php-framework convention, controller must be the first parma
    //for example, http://deniapps.com/work, work will be the controller
    $_controller = $_parts[0];
    //the rest will be params
    array_shift($_parts);
    $_params = $_parts;
}


$topnav = $topnav_right = null;
//$navis and $navis_right can be defined in /resource/library/common_functions.php
if(isset($navis)){
    $topnav = navi_gen($navis, $_controller);
}
if(isset($navis_right)){
    $topnav_right = navi_gen($navis_right);
}


$_shared_variables = compact("topnav", "topnav_right");

$pageRender = new pageRender($_controller, $_shared_variables);

//set admin if needed
$pageRender->set("isAdmin", $_isAdmin);

$file = CONTROLLER_PATH . "/" . $_controller . ".php";
$notfound  =  CONTROLLER_PATH . "/notfound.php";

if (file_exists($file)) {
    require_once $file;
} 
elseif(file_exists($notfound)) {
    header("HTTP/1.1 404 Not Found");
    require_once $notfound;
}
else{
    echo "missing notfound controller!!!";
    exit;
}


?>
