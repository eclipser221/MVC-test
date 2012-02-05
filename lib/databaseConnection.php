<?php

class databaseConnection {

    protected $conn;

    private $config;

    public function __construct($database = '') {

        $conf = new config;
        $this->config = $conf->get('database');
        if($database = '') {
            
        $this->conn = new PDO('mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['dbName'], $this->
            config['username'], $this->config['password']);
        } else {
            
            $this->conn = new PDO('mysql:host=' . $this->config['host'] . ';dbname=' . $database, $this->
            config['username'], $this->config['password']);
        }
        
        if (!$this->conn) {
            
            throw new Exception('Error : ' . $this->conn->error);
            return false;
        } else {
            
            return true;
        }
    }
    
    public function get() {
        return new PDO('mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['dbName'], $this->
            config['username'], $this->config['password']);
    }

}

?>