<?php

class userModel extends databaseConnection {
    
    protected $_connection;
    protected $config;
    
    
    public function __construct() {
        $conn = new databaseConnection;
        $this->_connection = $conn->get();
    }
      
    public function doThis($table) {
    }
    
    public function authUser($username, $password) {
        
        $rows = array();
        
        $sql = 'SELECT username , password , userid FROM users WHERE username = "' . $username . '"';
        if($row = $this->_connection->query($sql)) {
            
            $row->setFetchMode(PDO::FETCH_ASSOC);
            
            if($row->rowCount() > 0) {
                
                $user = $row->fetch();
                
                if($password == $user['password']) {
                    
                    $sess = new session();
                    $conf = new config;
                    $this->config = $conf->get('session');
                    $id = $user[$this->config['value']];
                    
                    if($sess->setSession($this->config['key'] , $id)) {
                        
                        echo '<pre>' . print_r($_SESSION,1) . '</pre>';
                     session_destroy();
                    }
                } else {
                    throw new Exception('Error : password not found.');
                }
            } else {
                throw new Exception('Error : User not found.');
            }
        } else {
            throw new Exception('Error : ' . $this->conn->error);
        }

    }
    
   }

?>