<?php

/* 
 * hanle home page
 *
 * 
 * 
 */

$page_title = 'deniX';
$meta_description = 'dexniX is extremly simple boostrap php framework, it does not come with too much functions, '
        . 'but it should be enough for you to start creating a website or application';

$variables = compact("page_title", "meta_description");

$pageRender->set($variables);
$pageRender->render();

?>
