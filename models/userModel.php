<?php

class user2Model extends databaseConnection {
    
    protected $_connection;
    protected $conn;
    
    public function __construct() {
        $this->conn = new databaseConnection;
        $this->_connection = $this->conn->get();
    }
      
    public function doThis($table) {
    }
    
    public function authUser($username, $password) {
        
        $rows = array();
        
        $sql = 'SELECT username , password FROM users WHERE username = "' . $username . '"';
        if($row = $this->_connection->query($sql)) {
            $row->setFetchMode(PDO::FETCH_ASSOC);
            if($row->rowCount() > 0) {
                $user = $row->fetch();
                if($password == $user['password']) {
                    echo '<pre>' . print_r($user,1) . '</pre>';
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