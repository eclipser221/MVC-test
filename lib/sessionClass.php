<?php

class session {
    
    private $config;
    private $_connection;
    
    public function __construct() {
        
        $conf = new config;
        $this->config = $conf->get('session');
        
        $conn = new databaseConnection;
        $this->_connection = $conn->get();
    }
    
    public function start() {
        
        if(!isset($_SESSION)) {
            
            session_start();
            return true;
        } else {
            
            return true;
        }
    }
    
    public function setSession($name , $value) {
        
        if (!isset($_SESSION)) {
            
            $this->start();
        }
        
        if($_SESSION[$name] = $value) {
            
            return true;
        }
        
        return false;
    }
    
    public function checkAuth() {
        
        $this->start();
        
        if(isset($_SESSION[$this->config['key']])) {
            
            return true;
        }
        else {
            
            return false;
        }
    }
}
//$this->config['key']
?>