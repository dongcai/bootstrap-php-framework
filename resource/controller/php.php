<?php

/*  php page controller
 *  
 * 
 */



$page_title = 'PHP5';
$meta_description = 'deniX is created by PHP5.3 and for PHP5+. PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language.';

$variables = compact("page_title", "meta_description");

$pageRender->set($variables);
$pageRender->render();



?>
