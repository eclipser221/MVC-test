<?php

class dbModel {

    private $conn;

    private $config;

    public function __construct() {
        
        $conf = new config;
        $this->config = $conf->get('database');
        $this->conn = new mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['dbName']);

        if (!$this->conn) {
            throw new Exception('Error: ' . mysqli_connect_error());
        }

    }

    public function select(array $where , $table , $rows = '*') {
        
        $set = '';
        
        foreach ($where as $field => $value) {
                $set .= $field . ' = "' . $value . '" AND ';
        }
        
        $set = substr($set, 0, -4);
        $query = 'SELECT ' . $rows . ' FROM ' . $table . ' WHERE ' . $set;
        
        if($result = $this->conn->query($query)) {
            $row = $result->fetch_object();
            return $query;
        } else {
            die($this->conn->error);
            return false;
        }
    }
    
    
    
    public function selectAll($table) {

        $rows = array();
        $sql = 'SELECT * FROM ' . $table;
        
        if($result = $this->conn->query($sql)  or die($this->conn->error)) {
            while ($row = $result->fetch_object()) {
                $rows[] = $row;
            }
        }
        
        return $rows;

    }

    public function save(array $data , $table , array $updateid = null)
    {

        if (!empty($data)) {
            foreach ($data as $field => $value) {
                $value = mysql_escape_string($value);
                if (!is_numeric($value)) {
                    $data[$field] = '"' . $value . '"';
                }
            }

            if ($updateid !== null) {
                
                $set = '';
                $id = '';

                foreach ($data as $field => $value) {

                    $set .= $field . ' = ' . $value . ' ,';

                }
                
                
                foreach ($updateid as $key => $val) {

                    $id .= $key . ' = \'' . $val . '\' ,';

                }

                $set = substr($set, 0, -1);
                $id = substr($id, 0, -1);
                $sql = 'UPDATE ' . $table . ' SET ' . $set . 'WHERE ' . $id ;

                $this->conn->query($sql) or die($this->conn->error);
                return $sql;

            } else {

                $fields = implode(',', array_keys($data));

                $values = implode(',', array_values($data));

                $this->connect->query('INSERT INTO ' . $table . ' (' . $fields . ')' .
                    ' VALUES (' . $values . ')') or die($this->conn->error);
                return 'lol';

            }

        }

    }
    
}


?>