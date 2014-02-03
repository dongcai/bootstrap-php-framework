<?php

/*  about page controller
 *  
 * 
 */



$page_title = 'Tools used to create deniX';
$meta_description = 'PHP,Bootstrap,NetBeans are all you need to create a decent website';

$bc_navis = array(
        "deniX" => SITE_BASE_URL,
        "tools" => null
    );
$breadcrumb = breadcrumb_gen($bc_navis);

$variables = compact("page_title", "meta_description", "breadcrumb");

$pageRender->set($variables);
$pageRender->render();



?>
