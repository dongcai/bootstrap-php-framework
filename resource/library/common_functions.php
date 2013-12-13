<?php

/**
 * add your custom variables or function here
 */
//for top navi
$navis = array(
    "Tools" => array(
        "controller" => "tools",
        "dropdown" => array(
            "PHP" => array("controller" => "tools", "params" => "php"),
            "Bootstrap" => array("controller" => "tools", "params" => "bootstrap"),
            "Netbeans" => array("controller" => "tools", "params" => "netbeans")
        )
    ),
    "Doc" => array("controller" => "doc")
);
//for top right navi

if (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {
    $navis_right = array(
        "Welcome! " . $_SESSION['user_name'],
        "logout" => SITE_BASE_URL . "/logout",
        "about" => SITE_BASE_URL . "/about"
    );
} else {
    $navis_right = array(
        "login" => array("controller" => "login"),
        "register" => array("controller" => "register"),
        "about" => SITE_BASE_URL . "/about"
    );
}
?>

