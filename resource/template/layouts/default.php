<?php
/**
 * the variable required in article_tpl.php are:
 * $_controller
 */

require_once TEMPLATE_PATH . "/commons/header_tpl.php";
require_once TEMPLATE_PATH . "/commons/topnavi_tpl.php";
if($this->action){
    require_once TEMPLATE_PATH . "/" . $this->controller . "_" .
            $this->action . "_tpl.php";
}
else{
    require_once TEMPLATE_PATH . "/" . $this->controller . "_tpl.php";
}

require_once TEMPLATE_PATH . "/commons/footer_tpl.php";
?>