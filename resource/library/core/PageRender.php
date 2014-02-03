<?php

/*
 * Render Page to invoke correct layout and view pages
 */

/**
 * 
 *
 * @author dcai
 */
class PageRender {
    public $controller;
    public $action = '';
    public $_variables = array();
    private $_layout='default';
    
    
    public function __construct($controller, $variables) {
        $this->controller = $controller;
        $this->set($variables);
    }
    
    public function setController($controller){
        $this->controller = $controller;
    }
    
    public function setLayout($layout){
        $this->_layout = $layout;
    }
    
    public function setAction($action){
        $this->action = $action;
    }
    
    public function set($k, $v=null){
        if(is_array($k)){
            foreach($k as $kk=>$vv){
                $this->_variables[$kk] = $vv;
            }
        }
        else{
            $this->_variables[$k] = $v;
        }
    }
    
    public function get($k){
        if(isset($this->_variables[$k])){
            return $this->_variables[$k];
        }
        else{
            return null;
        }
    }
    
    public function render($view=null){
        if(file_exists($view)){
           include($view); 
        }
        elseif($this->_layout){
           include TEMPLATE_PATH . "/layouts/" . $this->_layout . ".php";
        }
    }
    
}
