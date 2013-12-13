<?php

/**
 * handle page not found
 */


$page_title = SITE_NAME;
$meta_description = 'Page Not Found';

$variables = compact("page_title", "meta_description");

//override controller
$pageRender->setController("notfound");

$pageRender->set($variables);
$pageRender->render();


?>
