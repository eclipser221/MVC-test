<?php

abstract class baseController {
    
    protected $_registry;
    
    protected $load;
    
    public function __construct() {
        
        $this->_registry = Registry::getInstance();
        $this->load = new load();        
    }
    abstract public function index();
    
    public function __get($key) {
        if($return = $this->_registry->$key) {
            return $return;
        }
        return false;
    }
    
}

?>