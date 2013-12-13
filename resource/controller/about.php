<?php

/*  about page controller
 *  
 * 
 */



$page_title = 'About deniX';
$meta_description = 'deniX is a simplicity php framework. Simple is key and never overkilled! deniX is powered by Bootstrap3 and supports friendly URL.';

$variables = compact("page_title", "meta_description");

$pageRender->set($variables);
$pageRender->render();



?>
