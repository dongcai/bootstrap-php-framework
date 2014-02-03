<?php

/*  about page controller
 *  
 * 
 */



$page_title = 'About deniX';
$meta_description = 'deniX is a simplicity php framework. Simple is key and never overkilled! deniX is powered by Bootstrap3 and supports friendly URL.';

$bc_navis = array(
        "deniX" => SITE_BASE_URL,
        "about" => null
    );
$breadcrumb = breadcrumb_gen($bc_navis);


$variables = compact("page_title", "meta_description", "breadcrumb");

$pageRender->set($variables);
$pageRender->render();



?>
